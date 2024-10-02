@extends('admin.index')
@section('content')
<h2 class="text-center"> Danh Sách danh mục</h2>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $index=> $category)
        <tr class="text-center">
            <td>{{ $index+1 }}</td>
            <td>{{ $category->name }}</td>
            <td class="d-flex justify-content-center">
               <a href="{{route('categories.edit', ['id' => $category->id])}}" class="btn btn-primary">Sửa</a>
               <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('bạn có muốn xóa không?')" type="submit" class="btn btn-primary">Xóa</button>
               </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
@endsection