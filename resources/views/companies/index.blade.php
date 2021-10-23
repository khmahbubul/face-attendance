@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Companies</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title ">Companies</h3>
                <div class="card-options">
                    <a href="{{ route('companies.create') }}" class="btn btn-md btn-primary">
                        <i class="fa fa-plus"></i> Add a new Company
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Company Admin Name</th>
                                <th scope="col">Company Admin Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->admin->name }}</td>
                                    <td>{{ $company->admin->email }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('companies.edit', $company) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="" class="btn btn-sm btn-danger d-url" data-url="{{ route('companies.destroy', $company) }}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $companies->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.confirm-delete')
@endsection
