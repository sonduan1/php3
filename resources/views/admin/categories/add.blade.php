@extends('admin.index')
@section('content')
<h2 class="text-center">Thêm danh mục</h2>
<form action="{{route ('categories.store')}}" method="POST">
    @csrf
    <label for="">Tên danh mục</label>
    <input type="text" name="name" class="form-control">
    <input type="submit" value="Thêm mới" class="btn btn-primary">

</form>
 
@endsection