@extends('backend.layouts.master')
@section('title','Danh sách sản phẩm')
@section('content')
    <h1 class="mt-4">Danh sách sản phẩm</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
    </ol>
    @if (Session::has('success'))
        <p class="text-success" id="text-success">
            <i class="fa fa-check" aria-hidden="true"></i>
            {{ Session::get('success') }}
        </p>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">
                <a class="btn btn-success" href="{{ route('coffees.create') }}">Thêm mới</a>
            </h3>
            Giá từ
            <input type="number" id="upPrice">
            đến
            <input type="number" id="toPrice">
            <button type="submit" id="searchCoffees">Tìm kiếm</button>
        </div>
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Danh sách sản phẩm
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Giá bán</th>
                    <th>Thể loại</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($coffees as $key=>$coffee)
                    <tr id="coffee-{{$coffee->id}}">
                        <td>{{++$key}}</td>
                        <td>{{$coffee->name}}</td>
                        <td style="width: 150px"> @if($coffee->image)
                                <img src="{{ asset('storage/'.$coffee->image) }}" alt=""
                                     style="width: 100%">
                            @else
                                {{'Chưa có ảnh'}}
                            @endif</td>
                        <td>{{number_format($coffee->price)}}</td>
                        <td>{{$coffee->category->name}}</td>
                        <td>
                            <a href="{{route('coffees.edit',['id'=>$coffee->id])}}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a data-id="{{$coffee->id}}"
                               class="btn btn-danger delete-coffee">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
