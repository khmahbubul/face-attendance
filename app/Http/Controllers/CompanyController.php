<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Sync;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class CompanyController extends Controller
{
    /**
     * Constructor function
     */
    function __construct()
    {
        $this->middleware('permission:company-read|company-create|company-update|company-delete', ['only' => ['index','show']]);
        $this->middleware('permission:company-create', ['only' => ['create','store']]);
        $this->middleware('permission:company-update', ['only' => ['edit','update']]);
        $this->middleware('permission:company-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:companies,name', 'max:255'],
            'admin_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'face_api_secret' => ['required', 'string', 'min:8', 'max:255'],
            'logo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        DB::transaction(function () use ($request) {
            $company = Company::create([
                'name' => $request->name,
                'token' => bcrypt(time()),
                'face_api_secret' => $request->face_api_secret,
                'logo' => 'storage/' . $request->logo->store('company-logos')
            ]);

            $admin = User::create([
                'company_id' => $company->id,
                'name' => $request->admin_name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $role = Role::where('name', 'Admin')->first();
            $admin->assignRole([$role->id]);

            $monitor = User::create([
                'company_id' => $company->id,
                'name' => 'Monitor '.$admin->id,
                'email' => 'monitor-'.uniqid().'@email.com',
                'password' => bcrypt('12345678')
            ]);
            $token = explode('|', $monitor->createToken($company->name)->plainTextToken)[1];

            $role = Role::where('name', 'Monitor')->first();
            $monitor->assignRole([$role->id]);

            $company->update([
                'monitor_id' => $monitor->id,
                'token' => $token
            ]);

            Sync::create([
                'company_id' => $company->id,
                'name' => 'attendance'
            ]);

            Sync::create([
                'company_id' => $company->id,
                'name' => 'user',
                'version' => 1
            ]);
        });
        
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:companies,name,'.$company->id, 'max:255'],
            'admin_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,'.$company->admin->id, 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'max:255'],
            'face_api_secret' => ['required', 'string', 'min:8', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        DB::transaction(function () use ($company, $request) {
            $companyData = [
                'name' => $request->name,
                'face_api_secret' => $request->face_api_secret
            ];

            if ($request->logo)
                $companyData['logo'] = 'storage/' . $request->logo->store('company-logos');

            $company->update($companyData);
            
            $company->admin->update([
                'name' => $request->admin_name,
                'email' => $request->email
            ]);

            if ($request->password)
                $company->admin->update([
                    'password' => bcrypt($request->password)
                ]);
        });
        
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index');
    }
}
