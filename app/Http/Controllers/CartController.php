<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        // dd(Session::get('cart'));
        $data = [];
        $data["carts"] = Cart::with(['product.galleries', 'user'])
                            ->where('users_id', Auth::user()->id)
                            ->get();

        return view('pages.cart', $data);
    }
    
    public function delete(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        Session::forget('cart');
        Session::put('cart', Cart::where('users_id', Session::get('data_user')->id)->get());

        return redirect()->route('cart');
    }


    public function success()
    {
        return view('pages.success');
    }
}
