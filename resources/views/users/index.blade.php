@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title ">Users</h3>
                <div class="card-options">
                    <a href="{{ route('users.create') }}" class="btn btn-md btn-primary">
                        <i class="fa fa-plus"></i> Add a new User
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Face Status</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if ($user->face_status)
                                            <span class="badge badge-success  mr-1 mb-1 mt-1">Registered</span>
                                        @else
                                            <span class="badge badge-danger  mr-1 mb-1 mt-1">Registration Failed</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->status)
                                            <span class="badge badge-success  mr-1 mb-1 mt-1">Active</span>
                                        @else
                                            <span class="badge badge-danger  mr-1 mb-1 mt-1">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('users.show', $user) }}"><i class="fa fa-eye"></i> View</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('users.edit', $user) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="" class="btn btn-sm btn-danger d-url" data-url="{{ route('users.destroy', $user) }}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.confirm-delete')
@endsection
