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
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $totalTransactions }}</h3>
              <p>Total Transaction</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="{{ route('transactions.index') }}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $totalAccounts }}</h3>
              <p>User Registered</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('accounts.index') }}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Accounts</h3>
            </div>
            <div class="box-body">
              @forelse ($accounts as $account)
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Account</h3>
                  </div>
                  <div class="box-body">
                    <strong>Account ID:</strong> {{ $account->id }}<br>
                    <strong>Name:</strong> {{ $account->nama }}<br>
                    <strong>Type:</strong> {{ $account->jenis }}<br>
                    <strong>Created At:</strong> {{ $account->created_at }}<br>
                    <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-success btn-sm">Edit</a>
                  </div>
                </div>
              @empty
                <div class="alert alert-danger">
                  <h4>No accounts found.</h4>
                </div>
              @endforelse
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Transactions</h3>
            </div>
            <div class="box-body">
              @forelse ($transactions as $transaction)
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Transaction</h3>
                  </div>
                  <div class="box-body">
                    <strong>Transaction ID:</strong> {{ $transaction->id }}<br>
                    <strong>Amount:</strong> {{ number_format($transaction->nominal, 2) }} Rupiah<br>
                    <strong>Category:</strong> {{ $transaction->kategori }}<br>
                    <strong>Created At:</strong> {{ $transaction->created_at }}<br>
                    <a href="{{ route('transactions.destroy', $transaction->id) }}" class="btn btn-danger btn-sm">Delete</a>
                  </div>
                </div>
              @empty
                <div class="alert alert-danger">
                  <h4>No transactions found.</h4>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
    $(function () {
      var accounts = @json($accountCounts->keys());
      var accountData = @json($accountCounts->values());})
@endsection
