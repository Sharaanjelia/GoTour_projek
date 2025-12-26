<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        $icons = [
            'foto pemandu wisata.png','transportasi.jpeg','layanan 24jam.webp','IMG_7079-removebg-preview.png','paket makan.jpeg','paket kostum.jpeg','snorkeling.jpeg','akomodasi.jpeg','download.jpeg','informasi wisata.jpg','gunung1.jpeg','hal4.jpeg','hal5.webp','hal6.jpeg','hal7.jpeg'
        ];
        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'name' => 'Layanan '.$i,
                'slug' => 'layanan-'.$i,
                'description' => 'Deskripsi layanan wisata ke-'.$i.' untuk kebutuhan wisatawan.',
                'icon' => 'images/'.($icons[($i-1)%count($icons)]),
                'price' => 100000 + $i*10000,
                'is_active' => true,
            ];
        }
        foreach ($data as $item) {
            \App\Models\Service::updateOrCreate([
                'slug' => $item['slug']
            ], $item);
        }
    }
}
