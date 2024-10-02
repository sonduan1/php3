@extends('admin.index')
@section('content')
    <h2 class="text-center">Sửa sản phẩm : {{ $product->name }}</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Tên sản phẩm:</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        <label for="">Gía sản phẩm:</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}">
        <label for="">Mô tả sản phẩm:</label>
        <textarea name="description" id="" cols="20" class="form-control" rows="5"> {{ $product->description }}</textarea>
        <label for="">Số lượng sản phẩm:</label>
        <input type="number" name="quality" class="form-control" value="{{ $product->quality }}">
        <label for="">Ảnh sản phẩm:</label>
        <input type="text" name="image" class="form-control" value="{{ $product->image }}">
        <img src="{{ $product->image }}" height="50px" alt=""> <br>
        <label for="">Danh mục:</label>
        <select name="category_id" class="form-control" id="">
            @foreach ($categories as $cate)
                <option value="{{ $cate->id }}" @if ($product->category_id == $cate->id) selected @endif>{{ $cate->name }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Cập nhập" class="btn btn-primary m-2">
    </form>
@endsection