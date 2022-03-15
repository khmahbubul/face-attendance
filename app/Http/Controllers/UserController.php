<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Sync;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Constructor function
     */
    function __construct()
    {
        $this->middleware('permission:user-read|user-create|user-update|user-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('company_id', auth()->user()->company_id)->role('User')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::where('company_id', auth()->user()->company_id)->where('status', TRUE)->get(['id', 'name']);
        return view('users.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->storeValidation($request);

        $userData = $request->only([
            'department_id', 'designation_id', 'name', 'email',
            'eid', 'salary', 'phone', 'address', 'status'
        ]);
        $userData['sync_version'] = Sync::where('company_id', auth()->user()->company_id)->where('name', 'ai')->first()->version;
        $userData['office_hour'] = Carbon::parse($request->office_hour);
        $userData['password'] = bcrypt($request->password);
        $userData['company_id'] = auth()->user()->company_id;
        $userData['photo'] = 'storage/' . $request->photo->store('user-images');

        if ($request->cv)
            $userData['cv'] = 'storage/' . $request->cv->store('cv');

        if ($request->nid)
            $userData['nid'] = 'storage/' . $request->nid->store('nid');

        $user = User::create($userData);

        $role = Role::where('name', 'User')->first();
        $user->assignRole([$role->id]);

        $this->registerFace($user);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $attendances = $user->attendances()->latest()->paginate(10);
        return view('users.show', compact('attendances', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $departments = Department::where('status', TRUE)->get(['id', 'name']);

        return view('users.edit', compact('user', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->updateValidation($request, $user);

        $userData = $request->only([
            'department_id', 'designation_id', 'name', 'email',
            'eid', 'salary', 'phone', 'address', 'status'
        ]);
        $userData['sync_version'] = Sync::where('company_id', auth()->user()->company_id)->where('name', 'ai')->first()->version;
        $userData['office_hour'] = Carbon::parse($request->office_hour);

        if ($request->password)
            $userData['password'] = bcrypt($request->password);

        if ($request->photo)
            $userData['photo'] = 'storage/' . $request->photo->store('user-images');

        if ($request->cv)
            $userData['cv'] = 'storage/' . $request->cv->store('cv');

        if ($request->nid)
            $userData['nid'] = 'storage/' . $request->nid->store('nid');

        $user->update($userData);

        //TODO: update API not working
        /*if ($request->photo)
            $this->updateFace($user);*/

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    /**
     * Registers new face
     *
     * @param User $user
     * @return void
     */
    private function registerFace(User $user)
    {
        $photo64 = base64_encode(file_get_contents($user->photo_url));
        $response = Http::post('http://52.163.71.151:80/registration', [
            'user_id' => $user->id,
            'company' => $user->company->name, //need to remove this field
            'token' => $user->company->face_api_secret, //this field is not valued yet in the API
            'file' => $photo64
        ])->object();

        $user->update(['face_status' => $response->register]);
    }

    /**
     * Registers new face
     *
     * @param User $user
     * @return void
     */
    private function updateFace(User $user)
    {
        $photo64 = base64_encode(file_get_contents($user->photo_url));
        $response = Http::post('http://52.163.71.151:80/updateface', [
            'user_id' => $user->id,
            'token' => $user->company->face_api_secret, //this field is not valued yet in the API
            'file' => $photo64
        ])->object();

        $user->update(['face_status' => $response->register]);
    }

    private function storeValidation(Request $request)
    {
        $request->validate([
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'designation_id' => ['required', 'integer', 'exists:designations,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'eid' => ['nullable', 'string', 'max:255'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'phone' => ['nullable', 'string', 'max:14'],
            'address' => ['nullable', 'string', 'max:255'],
            'office_hour' => ['required', 'string'],
            'salary' => ['nullable', 'numeric'],
            'cv' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
            'nid' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'status' => ['required', 'in:0,1']
        ]);
    }

    private function updateValidation(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id, 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'max:255'],
            'eid' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'phone' => ['nullable', 'string', 'max:14'],
            'address' => ['nullable', 'string', 'max:255'],
            'office_hour' => ['required', 'string'],
            'salary' => ['nullable', 'numeric'],
            'cv' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
            'nid' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'status' => ['required', 'in:0,1']
        ]);
    }
}
