@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Info</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="wideget-user">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="wideget-user-desc d-flex">
                                <div class="wideget-user-img">
                                    <img class="" style="width: 128px;height: 128px;" src="{{ $user->photo_url }}" alt="img">
                                </div>
                                <div class="user-wrap">
                                    <h4>{{ $user->name }}</h4>
                                    <h6 class="text-muted mb-3 font-weight-normal">Member Since: {{ $user->created_at }}</h6>
                                    
                                    @if ($user->face_status)
                                        <span class="badge badge-success  mr-1 mb-1 mt-1">Registered</span>
                                    @else
                                        <span class="badge badge-danger  mr-1 mb-1 mt-1">Registration Failed</span>
                                    @endif
                                    
                                    @if ($user->status)
                                        <span class="badge badge-success  mr-1 mb-1 mt-1">Active</span>
                                    @else
                                        <span class="badge badge-danger  mr-1 mb-1 mt-1">Inactive</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="profile-log-switch">
                    <div class="media-heading">
                        <h5 class="text-uppercase"><strong>User Information</strong></h5>
                    </div>
                    <div class="table-responsive ">
                        <table class="table row table-borderless">
                            <tbody class="col-lg-12 col-xl-6 p-0">
                                <tr>
                                    <td><strong>Name :</strong> {{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Department :</strong> {{ $user->department->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone :</strong> {{ $user->phone }}</td>
                                </tr>
                            </tbody>
                            <tbody class="col-lg-12 col-xl-6 p-0">
                                <tr>
                                    <td><strong>Email :</strong> {{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Designation :</strong> {{ $user->designation->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Address :</strong> {{ $user->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title ">Attendances</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">First in</th>
                                <th scope="col">Last out</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance->id }}</td>
                                    <td>{{ date('d-m-Y', strtotime($attendance->created_at)) }}</td>
                                    <td>{{ $attendance->entry ? date('H:i:s', strtotime($attendance->entry)) : '' }}</td>
                                    <td>{{ $attendance->exit ? date('H:i:s', strtotime($attendance->exit)) : '' }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info log-url" data-url="{{ route('attendances.log', $attendance->user_id) }}?date={{ date('Y-m-d', strtotime($attendance->created_at)) }}" data-toggle="modal" data-target="#logModal"><i class="fa fa-file-text"></i> Log</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $attendances->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.attendance-log')
@endsection
