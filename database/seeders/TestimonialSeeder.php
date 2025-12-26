<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Testimonial::truncate();
        $data = [
            ["id"=>1,"name"=>'Mrs. Vicenta Roob','email'=>'georgianna44@example.com','message'=>'Quia qui omnis et expedita. Vitae eos fugit cupiditate et illum nam nihil quia. Qui et animi et expedita porro deleniti voluptatum.','photo'=>null,'approved'=>1,'user_id'=>null,'created_at'=>'2025-12-01 20:15:44','updated_at'=>'2025-12-01 20:15:44'],
            ["id"=>2,"name"=>'Omari Hamill','email'=>'aschuppe@example.net','message'=>'Ea fugiat qui nam assumenda rerum dolorem. Est officia dignissimos vitae molestiae quos ducimus. Natus voluptatem aut velit ipsam a.','photo'=>null,'approved'=>0,'user_id'=>null,'created_at'=>'2025-12-01 20:15:44','updated_at'=>'2025-12-01 20:15:44'],
            // ...lanjutkan data sesuai SQL dump (potong untuk contoh)...
        ];
        \App\Models\Testimonial::insert($data);
    }
}
