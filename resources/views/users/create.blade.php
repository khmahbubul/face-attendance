@extends('layouts.app')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fe fe-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create User</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create User</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputname">First Name</label>
                            <input type="text" class="form-control" id="exampleInputname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputname1">Last Name</label>
                            <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Last Name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email address">
                </div>
                <div class="form-group">
                    <label for="exampleInputnumber">Conatct Number</label>
                    <input type="number" class="form-control" id="exampleInputnumber" placeholder="ph number">
                </div>
                <div class="form-group">
                    <label class="form-label">About Me</label>
                    <textarea class="form-control" rows="6">My bio.........</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Website</label>
                    <input class="form-control" placeholder="http://spruko.com">
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-success mt-1">Submit</a>
            </div>
        </div>
    </div>
</div>
@endsection
