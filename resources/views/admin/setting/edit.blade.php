@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Setting</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Setting</li>
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
                            <h3 class="card-title">Edit Site Setting </h3>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <div class="card-body">
                                    <form action="{{ route('setting.update', [$setting->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">Site Title</label>
                                            <input type="name" name="site_title" value="{{ $setting->site_title }}" class="form-control" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Site Icon</label>
                                            <input type="name" name="icon" value="{{ $setting->icon }}" class="form-control" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Contact Title</label>
                                            <input type="name" name="contact_title" value="{{ $setting->contact_title }}" class="form-control" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Contact Sub Title</label>
                                            <input type="name" name="contact_subtitle" value="{{ $setting->contact_subtitle }}" class="form-control" placeholder="Enter name">
                                        </div>
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="copyright">Copyright</label>
                                                    <input type="copyright" name="copyright" value="{{ $setting->copyright }}" class="form-control" placeholder="copyright">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email">Contact Phone Number</label>
                                                    <input type="text" name="number" value="{{ $setting->number }}" class="form-control" placeholder="phone number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="logo">Site Logo</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="site_logo" class="custom-file-input" id="logo">
                                                        <label class="custom-file-label" for="logo">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <div style="max-width: 100px; max-height: 100px;overflow:hidden; margin-left: auto">
                                                        <img src="{{url('logo_image/',$setting->site_logo)}}" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Update Post</button>
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
</div>
@endsection
