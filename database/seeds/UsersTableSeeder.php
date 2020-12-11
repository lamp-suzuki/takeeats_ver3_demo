<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = Carbon::create("2020", "1", "1", "00", "00");
        $end = Carbon::create("2020", "12", "31", "00", "00");
        $min = strtotime($start);
        $max = strtotime($end);

        // ユーザー登録
        DB::table('users')->insert([
            [
                'name' => 'James Riney',
                'furigana' => 'ジェームズ ライニー',
                'tel' => '000-0000-0001',
                'email' => 'james_riney@coralcap.co',
                'password' => Hash::make('coral1001'),
                'created_at' => date('Y-m-d H:i:s', rand($min, $max)),
                'updated_at' => date('Y-m-d H:i:s', rand($min, $max)),
            ],
            [
                'name' => '澤山 陽平',
                'furigana' => 'さわやま ようへい',
                'tel' => '000-0000-0002',
                'email' => 'sawayama@coralcap.co',
                'password' => Hash::make('coral1001'),
                'created_at' => date('Y-m-d H:i:s', rand($min, $max)),
                'updated_at' => date('Y-m-d H:i:s', rand($min, $max)),
            ],
        ]);
    }
}
