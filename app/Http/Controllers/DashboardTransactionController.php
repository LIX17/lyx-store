<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Regency;
use App\TransactionDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        $sell_transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                            ->whereHas('product', function($product){
                                $product->where('users_id', Auth::user()->id);
                            })->get();
                            
        $buy_transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                            ->whereHas('transaction', function($transaction){
                                $transaction->where('users_id', Auth::user()->id);
                            })->get();
                            

        $data = [];
        $data['sell_transactions'] = $sell_transactions;
        $data['buy_transactions'] = $buy_transactions;
        return view('pages.dashboard-transactions', $data);
    }

    public function detail(Request $request, $id)
    {
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
                            ->findOrFail($id);
        $check = DB::table('users')
                        ->join('transactions', 'transactions.users_id', '=', 'users.id')
                        ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transactions_id')
                        ->where('transaction_details.id', $id)
                        ->first();
                        
        $province = Province::findOrFail($check->province_id);
        $regency = Regency::where('province_id', $province->id)->first();
        
        $data = [];
        $data['transaction'] = $transaction;
        $data['province'] = $province;
        $data['regency'] = $regency;
        
        return view('pages.dashboard-transactions-detail', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $item = TransactionDetail::findOrFail($id);
        $item->update($data);
        
        return redirect()->route('dashboard-transactions-detail', $id);
    }
}
