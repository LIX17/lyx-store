<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data["categories"] = Category::take(6)->get();
        $data["products"] = Product::with(['galleries'])->take(8)->get();
        //dd($data);
        return view('pages.home', $data);
    }
}
