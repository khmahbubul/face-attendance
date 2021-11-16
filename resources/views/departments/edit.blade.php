@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Department</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <form action="{{ route('departments.update', $department) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h3 class="card-title">Edit Department</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $department->name) }}" placeholder="Enter name" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="1">Active</option>
                            <option value="0" {{ old('status', $department->status) == 0 ? 'selected' : '' }}>Inactive</option>
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
