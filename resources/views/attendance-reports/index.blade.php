@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Attendance Reports</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title ">Attendance Reports</h3>
                <div class="card-options">
                    <form action="" autocomplete="off">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">From</label>
                                    <input type="text" name="start" class="form-control fc-datepicker @error('start') is-invalid @enderror" value="{{ request()->start }}" placeholder="MM/DD/YYYY">
                                    @error('start')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">To</label>
                                    <input type="text" name="end" class="form-control fc-datepicker @error('end') is-invalid @enderror" value="{{ request()->end }}" placeholder="MM/DD/YYYY">
                                    @error('end')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Select Department</label>
                                    <select name="department_id" class="form-control @error('department_id') is-invalid @enderror select2-show-search" data-placeholder="--select--">
                                        <option value="">--select--</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" {{ ($department->id == request()->department_id) ? 'selected' : '' }}>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Select User</label>
                                    <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror select2-show-search" data-placeholder="--select--">
                                        <option value="">--select--</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ ($user->id == request()->user_id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label class="form-label">&nbsp;</label>
                                <button class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div>
                    @if ($reports->count() > 0 && request()->user_id)
                        <a class="btn btn-sm btn-info" href="{{ route('attendance-reports.overall') . str_replace(request()->url(), '',request()->fullUrl()) }}" target="_blank"><i class="fa fa-download"></i> Overall</a>
                        <a class="btn btn-sm btn-primary" href=""><i class="fa fa-download"></i> Monthly</a>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">First in</th>
                                <th scope="col">Last out</th>
                                <th scope="col">Work Hour</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->user->name }}</td>
                                    <td>{{ $report->entry }}</td>
                                    <td>{{ $report->exit }}</td>
                                    <td>
                                        @php
                                            $datetime1 = new DateTime($report->entry);
                                            $datetime2 = new DateTime($report->exit);
                                            $interval = $datetime1->diff($datetime2);
                                        @endphp
                                        {{ $interval->format('%H Hours %i min') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $reports->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.attendance-log')
@endsection
