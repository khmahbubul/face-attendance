@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Apply Leave</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <form action="{{ route('leaves.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Apply Leave</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Select User *</label>
                        <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror select2-show-search" data-placeholder="--select--" required>
                            <option value="">--select--</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ ($user->id == old('user_id')) ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">From *</label>
                        <input type="text" name="start" class="form-control fc-datepicker @error('start') is-invalid @enderror" value="{{ old('start') }}" placeholder="MM/DD/YYYY" required>
                        @error('start')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">To *</label>
                        <input type="text" name="end" class="form-control fc-datepicker @error('end') is-invalid @enderror" value="{{ old('end') }}" placeholder="MM/DD/YYYY" required>
                        @error('end')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Reason *</label>
                        <textarea name="reason" class="form-control @error('reason') is-invalid @enderror" placeholder="Enter reason" required>{{ old('reason') }}</textarea>
                        @error('reason')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Proof Document (if needed)</label>
                        <input style="padding: 2px;" type="file" name="document" class="form-control @error('document') is-invalid @enderror">
                        @error('document')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="status" value="Pending">
                    <button type="submit" class="btn btn-success mt-1">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
