<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\User;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        // ensure at least one admin user exists
        $admin = User::where('email', 'admin@example.com')->first();
        if (!$admin) {
            // create via factory so password is set and hashed correctly
            $admin = User::factory()->create([
                'email' => 'admin@example.com',
                'name' => 'Admin User',
                'is_admin' => true,
            ]);
        } else {
            // make sure the found user is flagged as admin
            if (!$admin->is_admin) {
                $admin->is_admin = true;
                $admin->save();
            }
        }

        // Matikan foreign key checks agar truncate tidak error
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \App\Models\Package::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $images = [
            'Barusen Hills Ciwidey.jpg',
            'Ciwidey Valley Hot Spring Waterpark Resort.jpg',
            'Dusun Bambu Lembang.webp',
            'Farmhouse Lembang.webp',
            'Glamping Lakeside Rancabali.webp',
            'kampung cai ranva upas.webp',
            'kawah putih ciwidey.webp',
            'lembang.jpeg',
            'orchid forest cikole.jpg',
            'Taman Hutan Raya Ir. H. Djuanda.webp',
            'Tebing karaton.webp',
            'The Great Asia Africa Lembang.webp',
            'The Lodge Maribaya.jpg',
            'pantai.jpeg',
        ];
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'user_id' => $admin->id,
                'title' => 'Paket Wisata '.$i,
                'slug' => 'paket-wisata-'.$i,
                'excerpt' => 'Paket wisata populer ke-'.$i.' di Jawa Barat.',
                'description' => 'Deskripsi paket wisata ke-'.$i.' di Bandung dan sekitarnya.',
                'cover_image' => $images[($i-1)%count($images)],
                'duration' => '2 Hari 1 Malam',
                'price' => 1000000 + $i*100000,
                'featured' => $i%3==0,
                'is_active' => true,
            ];
        }
        foreach ($data as $item) {
            \App\Models\Package::updateOrCreate([
                'slug' => $item['slug']
            ], $item);
        }
    }
}
