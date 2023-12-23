<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['kategori', 'nominal', 'tujuan', 'account_id'];
    // Relasi dengan tabel accounts
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}
