<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
     protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama', 'jenis']; // Daftar kolom yang bisa diisi (sesuaikan dengan kebutuhan)
    const Personal = 'Personal';
    const Bisnis = 'Bisnis';
    protected $attributes = [
        'jenis' => self::Personal,
    ];
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'account_id', 'id');
    }
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (!in_array($model->jenis, [self::Personal, self::Bisnis])) {
                throw new \Exception('Nilai yang valid untuk kolom "Jenis" adalah "Personal" atau "Bisnis".');
            }
        });
    }
}
