@extends('admin.index')
@section('content')
<h2 class="text-center">Cập nhật danh mục: {{$category->name}}</h2>
<form action="{{route ('categories.update', $category->id)}}" method="POST">
    @csrf
    @method('PUT')
    <label for="">Tên danh mục</label>
    <input type="text" name="name" class="form-control" value="{{$category->name}}">
    <input type="submit" value="Cập nhật" class="btn btn-primary">

</form>
 
@endsection