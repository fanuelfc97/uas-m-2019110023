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
            <div class="col-md-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Transaction Categories Chart</h3>
                </div>
                <div class="box-body">
                  <canvas id="categoryChart" style="height: 250px;"></canvas>
                </div>
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
                    <a href="{{ route('accounts.edit', $account) }}" class="btn btn-success btn-sm">Edit</a>
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
                    <a href="{{ route('transactions.destroy', $transaction) }}" class="btn btn-danger btn-sm">Delete</a>
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
      // Data for the chart
      var categories = @json($categoryCounts->keys());
      var data = @json($categoryCounts->values());


      // Chart.js
      var categoryChartCanvas = $('#categoryChart').get(0).getContext('2d');
      var categoryChartData = {
        labels: categories,
        datasets: [
          {
            label: 'Transaction Categories',
            data: data,
            backgroundColor: '#00a65a',
          },
        ],
      };
      var categoryChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
      };

      // Create the bar chart
      new Chart(categoryChartCanvas, {
        type: 'bar',
        data: categoryChartData,
        options: categoryChartOptions,
      });
    });
  </script>
@endsection
