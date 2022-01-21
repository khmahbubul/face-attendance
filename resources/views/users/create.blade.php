@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create User</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Create User</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Enter name" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('email') }}" placeholder="Enter email" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password *</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Employee ID</label>
                        <input type="text" name="eid" class="form-control @error('eid') is-invalid @enderror" value="{{ old('eid') }}" placeholder="Enter ID" required>
                        @error('eid')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Photo *</label>
                        <input type="file" name="photo" style="padding: 2px;" class="form-control @error('photo') is-invalid @enderror" id="photo" placeholder="Enter photo" required>
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
                                <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
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
                            <option value="">--select--</option>
                        </select>
                        @error('designation_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Office Hour *</label>
                        <input type="text" id="tpBasic" name="office_hour" class="form-control @error('office_hour') is-invalid @enderror" value="{{ old('office_hour') }}" placeholder="Enter office hour" required>
                        @error('office_hour')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">CV</label>
                        <input type="file" name="cv" style="padding: 2px;" class="form-control @error('cv') is-invalid @enderror" id="cv" placeholder="Enter CV">
                        @error('cv')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">NID</label>
                        <input type="file" name="nid" style="padding: 2px;" class="form-control @error('nid') is-invalid @enderror" id="nid" placeholder="Enter NID">
                        @error('nid')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Salary</label>
                        <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}" placeholder="Enter salary">
                        @error('salary')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Enter phone">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="4" placeholder="Enter address">{{ old('address') }}</textarea>
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
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
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
            $(document).on('change', '#department', function() {
                let depId = $(this).val();
                let desOptions = '<option value="">--select--</option>';
                if (depId)
                    $.get("{{ url('/api/getDesignation') }}/"+depId, function(res){
                        $.each(res.data, function(key,val) {
                            desOptions += '<option value="'+val.id+'">'+val.name+'</option>';
                        });
                        $('#designation').html(desOptions);
                    });
                $('#designation').html(desOptions);
            });
        });
    </script>
@endpush
