<?php

use Illuminate\Database\Seeder;
use App\Models\Users\Subjects;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subjects::create([
            'subject' => '国語',
        ]);

        Subjects::create([
            'subject' => '数学',
        ]);

        Subjects::create([
            'subject' => '英語',
        ]);

        // 国語、数学、英語を追加
    }
}
