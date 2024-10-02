@extends('admin.index')
@section('content')
    <h2 class="text-center">Thêm sản phẩm</h2>
    <form action="{{ route('products.store') }}" method="POST" >
        @csrf
        <label for="">Tên sản phẩm:</label>
        <input type="text" name="name" class="form-control">
        <label for="">Gía sản phẩm:</label>
        <input type="number" name="price" class="form-control">
        <label for="">Mô tả sản phẩm:</label>
        <textarea name="description" id="" cols="20" class="form-control" rows="5"></textarea>
        <label for="">Số lượng sản phẩm:</label>
        <input type="number" name="quality" class="form-control">
        <label for="">Ảnh sản phẩm:</label>
        <input type="text" name="image" class="form-control">
        <label for="">Danh mục:</label>
        <select name="category_id" class="form-control" id="">
            @foreach ($categories as $cate)
                <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Thêm mới" class="btn btn-success m-2">
    </form>
@endsection