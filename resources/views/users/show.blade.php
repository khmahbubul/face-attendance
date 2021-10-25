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
                                    <td><strong>Phone :</strong> {{ $user->phone }}</td>
                                </tr>
                            </tbody>
                            <tbody class="col-lg-12 col-xl-6 p-0">
                                <tr>
                                    <td><strong>Email :</strong> {{ $user->email }}</td>
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
@endsection
