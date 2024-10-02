<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('vegetables')->join('categories','categories.id','=','vegetables.category_id')
        ->select('vegetables.*','categories.name as name_cate')->get();
        // dd($products);
        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.products.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = [
            'name' =>$request->input('name'),
            'category_id' =>$request->input('category_id'),
            'price' =>$request->input('price'),
            'description' =>$request->input('description'),
            'quality' =>$request->input('quality'),
            'image' =>$request->input('image'),
        ];
        DB::table('vegetables')->insert($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product =  DB::table('vegetables')->join('categories','categories.id','=','vegetables.category_id')
        ->select('vegetables.*','categories.name as name_cate')->where('vegetables.id',$id)->first();
        $categories = DB::table('categories')->get();
        // dd($product);
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' =>$request->input('name'),
            'category_id' =>$request->input('category_id'),
            'price' =>$request->input('price'),
            'description' =>$request->input('description'),
            'quality' =>$request->input('quality'),
            'image' =>$request->input('image'),
        ];
        DB::table('vegetables')->where('id',$id)->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('vegetables')->where('id',$id)->delete();
        return redirect()->route('products.index');
    }

}
