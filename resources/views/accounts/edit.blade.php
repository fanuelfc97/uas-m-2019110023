@extends('layouts.master')

@section('title', 'Edit Account')

@section('content')
<section class="mt-4 p-1 content-header">
    <h1>
      Edit Account
      <small>Edit Akun</small>
    </h1>
    <p></p>
    <p></p>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('accounts.update', $account) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ old('nama', $account->nama) }}" required>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="jenis" class="form-label">Jenis</label>
                    <select name="jenis" class="form-control" required>
                        <option value="Personal" {{ old('jenis', $account->jenis) == 'Personal' ? 'selected' : '' }}>Personal</option>
                        <option value="Bisnis" {{ old('jenis', $account->jenis) == 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="submit" class="form-label">  </label>
                    <button type="submit" class="btn btn-block btn-primary btn-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
