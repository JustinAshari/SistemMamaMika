<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'foto',
        'nama_barang',
        'harga',
        'deskripsi',
    ];

    public function Order(){
        return $this-> belongsTo(Order::class);
    }
}
