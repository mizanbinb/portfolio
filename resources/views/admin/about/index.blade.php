@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">about List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">about list</li>
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
                            <h3 class="card-title">about List</h3>
                            <a href="{{ route('about.create') }}" class="btn btn-primary">Create about</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Image</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($abouts as $about )


                                    <tr>
                                        <td>{{ $about->id }}</td>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->sub_title }}</td>
                                        <td>
                                            <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                <img src="{{url('about_image/',$about->image)}}" class="img-fluid img-rounded" alt="">
                                            </div>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('about.edit', [$about->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            <form action="{{ route('about.destroy', [$about->id]) }}" class="mr-1" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </form>
                                          <a href="" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
