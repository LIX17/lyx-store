<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\TransactionDetail;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                            ->whereHas('product', function($query){
                                $query->where('users_id', Auth::user()->id);
                            });
                            
        $revenue = $transactions->get()->reduce(function($carry, $item){
            return $carry + $item->price;
        });

        $customers = User::count();

        $data = [];
        $data['transaction_count'] = $transactions->count();
        $data['transactions'] = $transactions->get();
        $data['revenue'] = $revenue;
        $data['customer_count'] = $customers;        
        return view('pages.dashboard', $data);
    }
    
}
