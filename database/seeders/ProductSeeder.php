<?php
// database/seeders/ProdukSeeder.php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'foto' => 'noimage.png',
                'nama_barang' => 'Wanpaku Sandwich',
                'harga' => 12000,
                'deskripsi' => 'Wanpaku Sandwich ini berisi beef slice gurih, telur setengah matang, tomat segar, dan selada renyah di antara roti gandum tebal.',
            ],
            [
                'foto' => 'noimage.png',
                'nama_barang' => 'Salad Sayur',
                'harga' => 17000,
                'deskripsi' => 'Salad segar ini berisi campuran selada, jagung, wortel, dan timun, dilengkapi dengan potongan ayam panggang.',
            ],
            [
                'foto' => 'noimage.png',
                'nama_barang' => 'Fruit Sando',
                'harga' => 10000,
                'deskripsi' => 'Fruit Sando ini berisi potongan buah-buahan, diselipkan dalam roti lembut dengan krim kocok yang ringan dan manis.',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}