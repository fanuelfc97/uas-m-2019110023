<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all accounts from the database
        $accounts = Account::paginate(10);

        // Return the view with the accounts data
        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    // Generate a unique account ID starting from '10001'
    $nextAccountId = $this->generateNextAccountId();

    return view('accounts.create', compact('nextAccountId'));
}

private function generateNextAccountId()
{
    // Get the last account ID
    $lastAccountId = Account::max('id');

    // If there's no existing account, start from '10001'
    if (!$lastAccountId) {
        return '1000000000000001';
    }

    // Increment the last account ID
    $nextAccountId = $lastAccountId + 1;

    return (string) $nextAccountId;
}


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id' => 'required|string|size:16|unique:accounts',
            'nama' => 'required|string',
            'jenis' => 'required|in:Personal,Bisnis',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
        ]);

        // Create a new account with the validated data
        $account = Account::create($request->all());

        // Redirect to the account's show page
        return redirect()->route('accounts.index', $account);
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        // Return the view with the account data
        return view('accounts.index', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        // Return the view for editing the account
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        // Validate the request data
        $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|in:Personal,Bisnis',
            'updated_at' => 'nullable|date',
        ]);

        // Update the account with the validated data
        $account->update($request->all());

        // Redirect to the account's show page
        return redirect()->route('accounts.index', $account);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        // Delete the account
        $account->delete();

        // Redirect to the index page with a success message
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully');
    }
}
