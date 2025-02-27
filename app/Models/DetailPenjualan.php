<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPenjualan extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPenjualanFactory> */
    use HasFactory;

    protected $fillable = [
        'penjualan_id',
        'product_id',
        'jumlah',
        'subtotal',
    ];
    protected $with = [
        'product',
        'penjualan'
    ];

    function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    function penjualan(): BelongsTo
    {
        return $this->belongsTo(Penjualan::class);
    }
}
