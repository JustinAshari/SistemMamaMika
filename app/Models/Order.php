<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembeli',
        'product_id',
        'alamat',
        'jumlah',
        'total',
        'status',
        'payment'
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'total' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}