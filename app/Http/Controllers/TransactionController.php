<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all transactions from the database
        $transactions = Transaction::paginate(10);



        // Return the view with the transactions data
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        $accounts = Account::all();
        return view('transactions.create',compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'tujuan' => 'required|string',
            'nominal' => 'required|numeric|min:0',
            'kategori' => 'required|string',
                    ]);

        // Create a new transaction with the validated data
        $transactions = Transaction::create($request->all());

        // Redirect to the transaction's show page
        return redirect()->route('transactions.index', $transactions);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        // Return the view with the transaction data
        return view('transactions.index', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        // Return the view for editing the transaction
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        // Validate the request data
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'tujuan' => 'required|string',
            'nominal' => 'required|numeric|min:0',
            'kategori' => 'required|string',
        ]);

        // Update the transaction with the validated data
        $transaction->update($request->all());

        // Redirect to the transaction's show page
        return redirect()->route('transactions.index', $transaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        // Delete the transaction
        $transaction->delete();

        // Redirect to the index page with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully');
    }
}
