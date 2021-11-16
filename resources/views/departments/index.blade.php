@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Departments</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title ">Departments</h3>
                <div class="card-options">
                    <a href="{{ route('departments.create') }}" class="btn btn-md btn-primary">
                        <i class="fa fa-plus"></i> Add a new Department
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
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        @if ($department->status)
                                            <span class="badge badge-success  mr-1 mb-1 mt-1">Active</span>
                                        @else
                                            <span class="badge badge-danger  mr-1 mb-1 mt-1">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('departments.edit', $department) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="" class="btn btn-sm btn-danger d-url" data-url="{{ route('departments.destroy', $department) }}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $departments->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.confirm-delete')
@endsection
