<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $products = DB::table('vegetables')
            ->select('vegetables.*', 'categories.name as name_cate')
            ->join('categories', 'categories.id', '=', 'vegetables.category_id')
            ->get();
        return view('vegetables.home', compact('products'));
    }

    public function all()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('vegetables')
            ->select('vegetables.*', 'categories.name as name_cate')
            ->join('categories', 'categories.id', '=', 'vegetables.category_id')
            ->get();
        return view('vegetables.shop', compact('products', 'categories'));
    }
    public function detail($id)
    {
        $categories = DB::table('categories')->get();

        $product = DB::table('vegetables')
            ->join('categories', 'categories.id', '=', 'vegetables.category_id')
            ->select('vegetables.*', 'categories.name as name_cate')
            ->where('vegetables.id', $id)
            ->first();
        return view('vegetables.shop-detail', compact('product', 'categories'));
    }
}
