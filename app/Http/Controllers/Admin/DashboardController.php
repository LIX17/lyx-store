<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::where('transaction_status', '=', 'SUCCESS')->sum('total_price');
        $transaction = Transaction::where('transaction_status', '=', 'SUCCESS')->count();

        $data = [];
        $data["customer"] = $customer;
        $data["revenue"] = $revenue;
        $data["transaction"] = $transaction;
        return view('pages.admin.dashboard', $data);
    }
}
