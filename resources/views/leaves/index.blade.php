@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Leave Manager</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title ">Leave Manager</h3>
                <div class="card-options">
                    <a href="{{ route('leaves.create') }}" class="btn btn-md btn-primary">
                        <i class="fa fa-plus"></i> Apply for leave
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
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $leave)
                                <tr>
                                    <td>{{ $leave->id }}</td>
                                    <td>{{ $leave->user->name }}</td>
                                    <td>{{ $leave->start }}</td>
                                    <td>{{ $leave->end }}</td>
                                    <td>{{ $leave->status }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('leaves.show', $leave) }}"><i class="fa fa-eye"></i> View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $leaves->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.confirm-delete')
@endsection
