@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Designations</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title ">Designation</h3>
                <div class="card-options">
                    <a href="{{ route('designations.create') }}" class="btn btn-md btn-primary">
                        <i class="fa fa-plus"></i> Add a new Designation
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Department Name</th>
                                <th scope="col">Designation Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designations as $designation)
                                <tr>
                                    <td>{{ $designation->id }}</td>
                                    <td>{{ $designation->department->name }}</td>
                                    <td>{{ $designation->name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('designations.edit', $designation) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="" class="btn btn-sm btn-danger d-url" data-url="{{ route('designations.destroy', $designation) }}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $designations->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.confirm-delete')
@endsection
