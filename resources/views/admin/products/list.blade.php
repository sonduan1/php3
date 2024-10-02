@extends('admin.index')
@section('content')
    <h2 class="text-center">Danh sách sản phẩm</h2>
    <table class="table table-hover table-bordered">
        <thead>
            <tr class="text-center">
                <th>Tên sản phẩm</th>
                <th>Gía sản phẩm</th>
                <th>Mô tả</th>
                <th>Số lượng</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="text-center">
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->quality}}</td>
                <td><img src="{{$product->image}}" height="70px" alt=""></td>
                <td>{{$product->name_cate}}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-info" >Sửa</a>
                    <form action="{{route('products.destroy',$product->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn có muốn xóa không ?')" type="submit" class="btn btn-danger ms-2">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection