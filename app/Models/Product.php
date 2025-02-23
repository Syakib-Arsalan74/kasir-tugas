<?php

namespace App\Models;

use App\Models\DetailPenjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'namaProduck',
        'harga',
        'stok',
        'gambarProduk',
    ];

    protected $with = [
        'detailPenjualan'
    ];

    function detailPenjualan(): HasMany
    {
        return $this->hasMany(DetailPenjualan::class, 'Product_id');
    }
}
