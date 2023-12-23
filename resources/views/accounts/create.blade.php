@extends('layouts.master')

@section('title', 'Add New Account')

@section('content')
  <section class="content-header">
    <h1>
      Add New Account
      <small>Tambahkan Akun Baru</small>
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
            <form action="{{ route('accounts.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="id">Account ID</label>
                <input type="text" class="form-control" name="id" value="{{ $nextAccountId }}" readonly>
            </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" required>
              </div>
              <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis" class="form-control" required>
                  <option value="Personal">Personal</option>
                  <option value="Bisnis">Bisnis</option>
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
@endsection
