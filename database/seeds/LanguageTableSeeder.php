<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'tag'=>'cn',
            'title' => '中文',
        ]);
        Language::create([
            'tag'=>'en',
            'title' => 'English',
        ]);
    }
}
