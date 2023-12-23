<?php
namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $accounts = Account::all();
        $transactions = Transaction::all();
        $totalTransactions = Transaction::count();
        $totalAccounts = Account::count();


        $accountCounts = Transaction::groupBy('account_id')->selectRaw('count(*) as count, account_id')
        ->pluck('count', 'account_id');
        $categoryCounts = Transaction::groupBy('kategori')
        ->selectRaw('count(*) as count, kategori')
        ->pluck('count', 'kategori');

    return view('index', compact('totalAccounts','totalTransactions','accounts', 'transactions','accountCounts', 'categoryCounts'));
}
}
