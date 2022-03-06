@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Company</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Company</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('companies.update', $company) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Enter Company Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $company->name) }}" placeholder="Company Name" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Logo
                                    <span class="small">(Leave blank to keep previous)</span>
                                </label>
                                <input type="file" name="logo" style="padding: 2px;" class="form-control @error('logo') is-invalid @enderror" id="logo" placeholder="Enter logo">
                                @error('logo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Enter Company Admin Name</label>
                                <input type="text" class="form-control @error('admin_name') is-invalid @enderror" name="admin_name" value="{{ old('admin_name', $company->admin->name) }}" placeholder="Company Admin Name" required>
                                @error('admin_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Enter Company Admin Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $company->admin->email) }}" placeholder="Company Admin Email" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Enter Company Admin Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Company Admin Password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Face API Secret</label>
                                <input type="text" class="form-control @error('face_api_secret') is-invalid @enderror" name="face_api_secret" value="{{ old('face_api_secret', $company->face_api_secret) }}" placeholder="Face API Secret" required>
                                @error('face_api_secret')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
