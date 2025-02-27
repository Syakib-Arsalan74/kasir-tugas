<?php

namespace App\Models;

use App\Models\DetailPenjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Penjualan extends Model
{
    /** @use HasFactory<\Database\Factories\PenjualanFactory> */
    use HasFactory;

    protected $fillable = [
        'tanggalPenjualan',
        'totalHarga',
        'pelanggan_id',
        'user_id',
    ];

    protected $with = [
        'detailPenjualan',
        'pelanggan',
        'user'
    ];

    function detailPenjualan(): HasMany
    {
        return $this->hasMany(DetailPenjualan::class);
    }

    function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
