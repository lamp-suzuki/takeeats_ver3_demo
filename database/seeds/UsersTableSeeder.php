<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ユーザー登録
        DB::table('users')->insert([
            [
                'name' => 'James Riney',
                'furigana' => 'ジェームズ ライニー',
                'tel' => '000-0000-0001',
                'email' => 'james_riney@coralcap.co',
                'password' => Hash::make('coral1001'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '澤山 陽平',
                'furigana' => 'さわやま ようへい',
                'tel' => '000-0000-0002',
                'email' => 'sawayama@coralcap.co',
                'password' => Hash::make('coral1001'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
