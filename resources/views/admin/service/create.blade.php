@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create service</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('service.index') }}">service list</a></li>
                    <li class="breadcrumb-item active">Create service</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Create service</h3>
                            <a href="{{ route('service.index') }}" class="btn btn-primary">Go Back to service List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input type="name" name="title" class="form-control" id="name" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Description</label>
                                            <input type="name" name="description" class="form-control" id="name" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Icon</label>
                                            <input type="name" name="icon" class="form-control" id="name" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="featured">Image</label>
                                            <input type="file" name="image" class="form-control">
                                      </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
