<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'package'])->get();
        //route to view in folder admin/transaction/transactions
        // dd($transactions);
        return view('admin.transaction.transactions', [
            'transactions' => $transactions
        ]);
    }
}
