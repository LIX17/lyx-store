<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        //dd(Session::get('data_user')->id);
        $data = [];
        $data["user"] = Session::get('data_user');
        $data["categories"] = Category::take(6)->get();
        $data["products"] = Product::with(['galleries'])->take(8)->get();
        //dd($data);
        return view('pages.home', $data);
    }
}
