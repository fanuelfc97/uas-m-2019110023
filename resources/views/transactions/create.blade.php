@extends('layouts.master')

@section('title', 'Add New Transaction')

@section('content')
  <section class="content-header">
    <h1>
      Add New Transaction
      <small>Tambahkan Transaksi</small>
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="box box-primary">
          <div class="box-body">
            <form action="{{ route('transactions.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="account_id">Account</label>
                <select name="account_id" class="form-control" id="accountSelect" required>
                    @foreach ($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <select class="form-control" name="tujuan" id="tujuan" required>
                    @foreach ($accounts as $account)
                        <option value="{{ $account->nama }}">{{ $account->nama }}</option>
                    @endforeach
                </select>
            </div>

              <div class="form-group">
                <label for="nominal">Nominal (Rupiah)</label>
                <input type="number" step="1" class="form-control" name="nominal" required>
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="kategori" required>
                  <option value="operasional">Operasional</option>
                  <option value="pembelian">Pembelian</option>
                  <option value="lain-lain">Lain-lain</option>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    document.getElementById('accountSelect').addEventListener('change', function() {
        const selectedAccountId = this.value;
        const selectedAccount = @json($accounts);
        const selectedTujuan = selectedAccount.find(account => account.id == selectedAccountId).nama;

        // Set the value of the "tujuan" field and remove the "disabled" attribute
        const tujuanField = document.getElementById('tujuan');
        tujuanField.value = selectedTujuan;
        tujuanField.removeAttribute('disabled');
    });
</script>

@endsection
