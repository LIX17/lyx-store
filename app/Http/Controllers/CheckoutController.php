<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Transaction;
use App\TransactionDetail;
use Exception;
use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $user = Auth::user();
        $user->update($request->except('total_price'));

        //checkout process
        $code = 'STR'.date('YmdHis').rand(100,999);
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->get();

        //create transaction
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'code' => $code,      
            'insurance_price' => 0,                  
            'shipping_price' => 0,
            'transaction_status' => 'PENDING',
            'total_price' => $request->total_price,
        ]);

        foreach($carts as $cart)
        {
            $trans = 'TRS'.date('YmdHis').rand(100,999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,      
                'price' => $cart->product->price,                  
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $trans,
            ]);
        }
        //delete cart data
        Cart::where('users_id', Auth::user()->id)->delete();
        Session::forget('cart');
        Session::put('cart', Cart::where('users_id', Auth::user()->id)->get());

        //config midtrans   
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        //pass arr to midtrans
        $midtrans = [
            "transaction_details" => [
                "order_id"  => $code,
                "gross_amount"=> (int)$request->total_price,
            ],
            "customer_details" => [
                "first_name"  => Auth::user()->name,
                "email"=> Auth::user()->email,
            ],
            "enabled_payments" => [
                "gopay", "bca_va", "bank_transfer"
            ],
            "vtweb" => []
        ]; 

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            
            // Redirect to Snap Payment Page
            // header('Location: ' . $paymentUrl);
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    public function callback(Request $request)
    {

    }
}
