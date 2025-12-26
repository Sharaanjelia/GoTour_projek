<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PhotoRecommendation;

class PhotoRecommendationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        $images = [
            'foto cowok.jpg','foto hana.jpeg','foto lina.jpeg','foto orchid.jpeg','foto pemandu wisata.png','foto tizy.jpeg','foto11.jpeg','foto12.jpeg','foto13.jpeg','foto14.jpg','fotoaqila.jpg','fotosharabraga.webp','fotoviwidey valley.jpeg','gya foto 12.jpg','gya foto 9.jpg'
        ];
        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'title' => 'Rekomendasi Foto '.$i,
                'image' => 'images/'.($images[($i-1)%count($images)]),
                'description' => 'Spot foto ke-'.$i.' yang instagramable di Bandung.',
                'is_active' => true,
            ];
        }
        foreach ($data as $item) {
            \App\Models\PhotoRecommendation::updateOrCreate([
                'title' => $item['title']
            ], $item);
        }
    }
}
