@extends('backend.layouts.master')
@section('title','Chỉnh sửa sản phẩm')
@section('content')
    <h1 class="mt-4">Chỉnh sửa sản phẩm</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{route('coffees.index')}}">Danh sách sản phẩm</a></li>
        <li class="breadcrumb-item active">Chỉnh sửa sản phẩm</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title">Chỉnh sửa sản phẩm</p>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <lable>Tên</lable>
                                <strong class="text-danger">*</strong>
                                <input type="text" value="{{$coffee->name}}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giá bán</label>
                                <strong class="text-danger">*</strong>
                                <input type="number" value="{{$coffee->price}}"
                                       class="form-control @error('price') is-invalid  @enderror"
                                       name="price">
                                @error('price')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="category_id">
                                    <option
                                        value="{{$coffee->category->id}}">{{$coffee->category->name}}</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </br>
                            <div class="form-group">
                                <label for="image">Ảnh</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>
                            </br>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <button class="btn btn-secondary"
                                    onclick="window.history.go(-1); return false;">Hủy
                            </button>
                            <p>Trường <strong class="text-danger"> * </strong> là trường bắt buộc!</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
