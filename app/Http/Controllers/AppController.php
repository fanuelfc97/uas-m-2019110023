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

        $categoryCounts = Transaction::groupBy('kategori')
        ->selectRaw('count(*) as count, kategori')
        ->pluck('count', 'kategori');

    return view('index', compact('accounts', 'transactions', 'categoryCounts'));
}
}
