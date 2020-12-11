<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // カテゴリー登録
        DB::table('categories')->insert([
            [
                'manages_id' => 1,
                'name' => '焼き鳥',
                'sort_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manages_id' => 1,
                'name' => 'サラダボウル',
                'sort_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 商品登録
        DB::table('products')->insert([
            [
                'manages_id' => 1,
                'categories_id' => 1,
                'shops_id' => '1,',
                'name' => '店長のおすすめセット',
                'price' => 678,
                'stock' => 99,
                'lead_time' => 30,
                'status' => 'public',
                'sort_id' => 1,
                'takeout_flag' => 1,
                'delivery_flag' => 1,
                'ec_flag' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manages_id' => 1,
                'categories_id' => 1,
                'shops_id' => '1,',
                'name' => '唐揚げ5個',
                'price' => 724,
                'stock' => 99,
                'lead_time' => 30,
                'status' => 'public',
                'sort_id' => 1,
                'takeout_flag' => 1,
                'delivery_flag' => 1,
                'ec_flag' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manages_id' => 1,
                'categories_id' => 2,
                'shops_id' => '1,',
                'name' => 'チョップドサラダ',
                'price' => 584,
                'stock' => 99,
                'lead_time' => 30,
                'status' => 'public',
                'sort_id' => 1,
                'takeout_flag' => 1,
                'delivery_flag' => 1,
                'ec_flag' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
