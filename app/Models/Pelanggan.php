<?php

namespace App\Models;

use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    /** @use HasFactory<\Database\Factories\PelangganFactory> */
    use HasFactory;

    protected $fillable = [
        'namaPelanggan',
        'alamat',
        'noTelp',
    ];

    protected $with = [
        'penjualan'
    ];

    function penjualan () : HasMany {
        return $this->hasMany(Penjualan::class, 'pelanggan_id');
    }
}
