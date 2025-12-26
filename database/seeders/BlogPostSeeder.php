<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat
        \App\Models\BlogPost::truncate();
        $data = [
            ["id"=>1,"title"=>'Eos ut sint saepe enim.','slug'=>'eos-ut-sint-saepe-enim-9491','excerpt'=>'Hic reprehenderit nostrum qui est. Nobis perferendis dolore accusamus sapiente. Dolores est voluptatem voluptatum et qui necessitatibus. Voluptatem perspiciatis eos est rerum quia possimus.','content'=>'Illum sequi iusto autem necessitatibus aspernatur. Quis autem sequi odit pariatur repellat. Perspiciatis nihil at autem est incidunt sunt dolores laudantium. Dolor minima est exercitationem quaerat nesciunt ut.\n\nEt saepe qui in eum esse fugit. Quia quia aperiam incidunt et omnis rerum et. Illum suscipit illo enim saepe. Aut aut eligendi animi enim quibusdam ea.\n\nOccaecati aperiam non quis et. Sequi assumenda mollitia praesentium totam a corporis est. Itaque ad accusantium voluptatibus odio asperiores sit.\n\nIncidunt fuga voluptas et voluptatum maiores qui recusandae. Sint totam ipsa explicabo eum. Fugiat officiis doloremque dolores quod. Nihil ea et officia voluptatem sint asperiores ullam est. Soluta illum autem alias distinctio error.',"cover_image"=>null,"user_id"=>null,"published_at"=>null,"is_active"=>1,"created_at"=>'2025-12-01 20:15:44',"updated_at"=>'2025-12-01 20:15:44'],
            ["id"=>2,"title"=>'Deleniti voluptas aspernatur id ea non.','slug'=>'deleniti-voluptas-aspernatur-id-ea-non-3973','excerpt'=>'Itaque assumenda quibusdam et porro optio aspernatur vel. Temporibus deserunt perferendis ea vero. Aut non explicabo laborum cupiditate sit minima consequatur temporibus. Eos asperiores corporis dignissimos officiis iste temporibus saepe quia.','content'=>'Sequi placeat eaque vel et eum. Eos aut laborum enim sed quod aliquam.\n\nVoluptas sunt et odit ut in. Aut possimus vero aperiam et accusantium labore ut et. Et dicta vero voluptatem dolorum ut ipsum molestiae et. Labore ullam et eaque.\n\nNatus voluptates cupiditate voluptatibus qui dolores aut quis. Similique illo id in commodi vel ut.\n\nEt quo quam repellendus consequuntur porro ducimus et esse. Neque officia non voluptatem id esse necessitatibus iure non. Molestias provident repudiandae corporis qui quam. Sunt nulla fugiat debitis deserunt tenetur maiores.',"cover_image"=>null,"user_id"=>null,"published_at"=>'2025-10-25 00:00:02',"is_active"=>1,"created_at"=>'2025-12-01 20:15:44',"updated_at"=>'2025-12-01 20:15:44'],
            // ...lanjutkan data sesuai SQL dump (potong untuk contoh)...
        ];
        \App\Models\BlogPost::insert($data);
    }
}
