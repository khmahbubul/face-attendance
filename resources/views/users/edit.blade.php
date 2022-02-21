@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $user->name) }}" placeholder="Enter name" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('email', $user->email) }}" placeholder="Enter email" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password
                            <span class="small">(Leave blank to keep previous)</span>
                        </label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Employee ID</label>
                        <input type="text" name="eid" class="form-control @error('eid') is-invalid @enderror" value="{{ old('eid', $user->eid) }}" placeholder="Enter ID">
                        @error('eid')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Photo
                            <span class="small">(Leave blank to keep previous)</span>
                        </label>
                        <input type="file" name="photo" style="padding: 2px;" class="form-control @error('photo') is-invalid @enderror" id="photo" placeholder="Enter photo">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Department *</label>
                        <select id="department" name="department_id" class="form-control @error('department_id') is-invalid @enderror" required>
                            <option value="">--select--</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Designation *</label>
                        <select id="designation" name="designation_id" class="form-control @error('designation_id') is-invalid @enderror" required>
                        </select>
                        @error('designation_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Office Hour *</label>
                        <input type="text" id="tpBasic" name="office_hour" class="form-control @error('office_hour') is-invalid @enderror" value="{{ old('office_hour', $user->office_hour) }}" placeholder="Enter office hour" required>
                        @error('office_hour')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">CV
                            <span class="small">(Leave blank to keep previous)</span>
                        </label>
                        <input type="file" name="cv" style="padding: 2px;" class="form-control @error('cv') is-invalid @enderror" id="cv" placeholder="Enter CV">
                        @error('cv')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">NID
                            <span class="small">(Leave blank to keep previous)</span>
                        </label>
                        <input type="file" name="nid" style="padding: 2px;" class="form-control @error('nid') is-invalid @enderror" id="nid" placeholder="Enter NID">
                        @error('nid')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Salary</label>
                        <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary', $user->salary) }}" placeholder="Enter salary">
                        @error('salary')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone', $user->phone) is-invalid @enderror" id="exampleInputnumber" value="{{ old('phone', $user->phone) }}" placeholder="Enter phone">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="4" placeholder="Enter address">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="1">Active</option>
                            <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success mt-1">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('footer')
    <script>
        $(document).ready(function() {
            getDesignation();

            $(document).on('change', '#department', function() {
                getDesignation();
            });

            function getDesignation() {
                let depId = $('#department').val();
                if (depId)
                    $.get("{{ url('/api/getDesignation') }}/"+depId+"/{{ old('designation_id', $user->designation_id) }}", function(res) {
                        $('#designation').html(res.data);
                    });
                else
                    $('#designation').html('<option value="">--select--</option>');
            }
        });
    </script>
@endpush
