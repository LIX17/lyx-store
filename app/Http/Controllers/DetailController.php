<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $data = [];
        $data["product"] = Product::with(['galleries', 'user'])->where('slug', $id)->firstOrFail();

        return view('pages.detail', $data);
    }

    public function add(Request $request, $id)
    {
        $data = [
            'products_id' => $id,
            'users_id' => Session::get('data_user')->id
        ];

        Cart::create($data);
        Session::forget('cart');
        Session::put('cart', Cart::where('users_id', Session::get('data_user')->id)->get());

        return redirect()->route('cart');
    }
}
