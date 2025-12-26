<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        $images = [
            'Barusen Hills Ciwidey.jpg','Ciwidey Valley Hot Spring Waterpark Resort.jpg','Dusun Bambu Lembang.webp','Farmhouse Lembang.webp','Glamping Lakeside Rancabali.webp','kampung cai ranva upas.webp','kawah putih ciwidey.webp','lembang.jpeg','orchid forest cikole.jpg','tafsor barn.jpg','Taman Hutan Raya Ir. H. Djuanda.webp','Tebing karaton.webp','The Great Asia Africa Lembang.webp','The Lodge Maribaya.jpg','pantai.jpeg'
        ];
        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'title' => 'Destinasi Wisata '.$i,
                'slug' => 'destinasi-wisata-'.$i,
                'excerpt' => 'Destinasi wisata populer ke-'.$i.' di Jawa Barat.',
                'description' => 'Deskripsi destinasi wisata ke-'.$i.' di Bandung dan sekitarnya.',
                'cover_image' => 'images/'.($images[($i-1)%count($images)]),
                'location' => 'Bandung',
                'duration' => '2 Hari 1 Malam',
                'price' => 500000 + $i*10000,
                'featured' => $i%3==0,
                'is_active' => true,
                'user_id' => 2,
            ];
        }
        foreach ($data as $item) {
            \App\Models\Destination::updateOrCreate([
                'slug' => $item['slug']
            ], $item);
        }
    }
}
