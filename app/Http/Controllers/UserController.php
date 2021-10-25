<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Constructor function
     */
    function __construct()
    {
        $this->middleware('permission:user-read|user-create|user-update|user-delete', ['only' => ['index','show']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-update', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role('User')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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

        $userData = $request->only(['name','email','phone','address','status']);
        $userData['password'] = bcrypt($request->password);
        $userData['company_id'] = auth()->user()->company_id;
        $userData['photo'] = $request->photo->store('user-images');
        $user = User::create($userData);

        $role = Role::where('name', 'User')->first();
        $user->assignRole([$role->id]);

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
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
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

        $userData = $request->only(['name','email','phone','address','status']);

        if ($request->password)
            $userData['password'] = bcrypt($request->password);
        
        if ($request->photo)
            $userData['photo'] = $request->photo->store('user-images');
        
        $user->update($userData);

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

    private function storeValidation(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'phone' => ['nullable', 'string', 'max:14'],
            'address' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:0,1']
        ]);
    }

    private function updateValidation(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id, 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'phone' => ['nullable', 'string', 'max:14'],
            'address' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:0,1']
        ]);
    }
}
