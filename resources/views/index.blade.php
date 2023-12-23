@extends('layouts.master')

@section('title', 'Home')

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Home Page
      </h1>
    </section>
    <section class="content">
      <div class="container-fluid" style="padding-left: 0;">
        <div class="row">
          <div class="col-md-6">
            {{-- Display Accounts --}}
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Akun:</h3>
              </div>
              <p>              </p>
              @forelse ($accounts as $account)
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Account</h3>
                  </div>
                  <div class="box-body">
                    <h3>Account ID: {{ $account->id }}</h3>
                    <p>Name: {{ $account->name }}</p>
                    <p>Balance: {{ number_format($account->balance, 2) }} Rupiah</p>
                    <a href="{{ route('accounts.show', $account) }}" class="btn btn-success">Details</a>
                  </div>
                </div>
              @empty
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">No accounts found.</h3>
                  </div>
                </div>
              @endforelse
            </div>
          </div>

          <div class="col-md-6">
            {{-- Display Transactions --}}
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Transaksi:</h3>
              </div>
              <p>              </p>
              @forelse ($transactions as $transaction)
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Transaction</h3>
                  </div>
                  <div class="box-body">
                    <h3>Transaction ID: {{ $transaction->id }}</h3>
                    <p>Created At: {{ $transaction->created_at }}</p>
                    <p>Amount: {{ number_format($transaction->amount, 2) }} Rupiah</p>
                    <a href="{{ route('transactions.show', $transaction) }}" class="btn btn-info">Details</a>
                  </div>
                </div>
              @empty
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">No transactions found.</h3>
                  </div>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
