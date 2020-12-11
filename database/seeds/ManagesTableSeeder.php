<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 店舗アカウントの追加
        DB::table('manages')->insert([
            [
                'name' => 'CoralCafe',
                'domain' => 'demo',
                'email' => 'coral@takeeats.jp',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'tel' => '000-000-0000',
                'password' => Hash::make('coral1001'),

                'delivery_flag' => 1,
                'ec_flag' => 0,
                'delivery_shipping' => 550,
                'delivery_area' => '',
                'delivery_sun' => '11:30,14:00,17:00,21:00',
                'delivery_mon' => '11:30,14:00,17:00,21:00',
                'delivery_tue' => '11:30,14:00,17:00,21:00',
                'delivery_wed' => '11:30,14:00,17:00,21:00',
                'delivery_thu' => '11:30,14:00,17:00,21:00',
                'delivery_fri' => '11:30,14:00,17:00,21:00',
                'delivery_sat' => '11:30,14:00,17:00,21:00',

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);

        // 店舗の追加
        DB::table('shops')->insert([
            [
                'manages_id' => 1,
                'name' => '本店',
                'zipcode' => '100-0004',
                'pref' => '東京都',
                'address1' => '千代田区大手町１丁目',
                'address2' => '９−２ 大手町フィナンシャルシティ グランキューブ3階',
                'email' => 'coral@takeeats.jp',
                'tel' => '000-000-0000',
                'googlemap_url' => 'https://g.page/coral-capital?share',

                'takeout_preparation' => 30,
                'takeout_sun' => '11:30,14:00,17:00,21:00',
                'takeout_mon' => '11:30,14:00,17:00,21:00',
                'takeout_tue' => '11:30,14:00,17:00,21:00',
                'takeout_wed' => '11:30,14:00,17:00,21:00',
                'takeout_thu' => '11:30,14:00,17:00,21:00',
                'takeout_fri' => '11:30,14:00,17:00,21:00',
                'takeout_sat' => '11:30,14:00,17:00,21:00',

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
