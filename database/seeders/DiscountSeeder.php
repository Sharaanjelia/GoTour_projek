<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discount;

class DiscountSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Discount::truncate();
        $data = [
            ["id"=>1,"code"=>'SALE648',"percent"=>28,"description"=>'Amet libero sed nihil quos dolor enim temporibus.','starts_at'=>'2025-11-08 20:15:44','ends_at'=>'2026-01-19 20:15:44','is_active'=>1,'created_at'=>'2025-12-01 20:15:44','updated_at'=>'2025-12-01 20:15:44'],
            ["id"=>2,"code"=>'SALE490',"percent"=>48,"description"=>'Qui eaque enim accusantium quis accusamus reprehenderit rerum deserunt.','starts_at'=>'2025-11-01 20:15:44','ends_at'=>'2026-01-02 20:15:44','is_active'=>1,'created_at'=>'2025-12-01 20:15:44','updated_at'=>'2025-12-01 20:15:44'],
            ["id"=>3,"code"=>'SALE153',"percent"=>30,"description"=>'Maxime commodi sequi odit officiis rem.','starts_at'=>'2025-11-04 20:15:44','ends_at'=>'2026-01-23 20:15:44','is_active'=>1,'created_at'=>'2025-12-01 20:15:44','updated_at'=>'2025-12-01 20:15:44'],
            ["id"=>4,"code"=>'SALE990',"percent"=>22,"description"=>'Temporibus vel voluptas qui laborum et.','starts_at'=>'2025-11-09 20:15:44','ends_at'=>'2026-01-19 20:15:44','is_active'=>1,'created_at'=>'2025-12-01 20:15:44','updated_at'=>'2025-12-01 20:15:44'],
            ["id"=>5,"code"=>'SALE151',"percent"=>29,"description"=>'Id non consequuntur ut est voluptas.','starts_at'=>'2025-11-12 00:34:26','ends_at'=>'2025-12-14 00:34:26','is_active'=>1,'created_at'=>'2025-12-02 00:34:26','updated_at'=>'2025-12-02 00:34:26'],
            ["id"=>6,"code"=>'SALE937',"percent"=>33,"description"=>'Ea reiciendis quia inventore ab et eum qui.','starts_at'=>'2025-11-12 00:34:26','ends_at'=>'2026-01-25 00:34:26','is_active'=>1,'created_at'=>'2025-12-02 00:34:26','updated_at'=>'2025-12-02 00:34:26'],
            ["id"=>7,"code"=>'SALE916',"percent"=>37,"description"=>'Quo quo voluptatem fugiat ipsum.','starts_at'=>'2025-11-09 00:34:26','ends_at'=>'2026-01-05 00:34:26','is_active'=>1,'created_at'=>'2025-12-02 00:34:26','updated_at'=>'2025-12-02 00:34:26'],
            ["id"=>8,"code"=>'SALE795',"percent"=>45,"description"=>'Non dolorem animi ipsam et illum.','starts_at'=>'2025-11-02 00:34:26','ends_at'=>'2025-12-23 00:34:26','is_active'=>1,'created_at'=>'2025-12-02 00:34:26','updated_at'=>'2025-12-02 00:34:26'],
        ];
        \App\Models\Discount::insert($data);
    }
}
