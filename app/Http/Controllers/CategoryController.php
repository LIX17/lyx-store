<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [];
        $data["categories"] = Category::all();
        $data["products"] = Product::with(['galleries'])->paginate(16);
        return view('pages.category', $data);
    }

    public function detail(Request $request, $slug)
    {
        //dd($request->id);
        $cat = Category::where('slug', $slug)->firstOrFail();
        $data = [];
        $data["categories"] = Category::all();
        $data["products"] = Product::with(['galleries'])->where('categories_id', $cat->id)->paginate(16);
        return view('pages.category', $data);
    }
}
