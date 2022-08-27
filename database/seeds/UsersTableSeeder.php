<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'over_name' => 'Atlas',
            'under_name' => '太郎',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'タロウ',
            'mail_address' => 'atlas@co.jp',
            'sex' => '1',
            'birth_day' => '2019-06-03 00:00:00',
            'role' => '1',
            'password' => bcrypt('atlas123'),
        ]);
    }
}
