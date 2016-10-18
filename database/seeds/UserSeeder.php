<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'john@example.com',
            'name'  => 'john',
            'password' => bcrypt('123456')
        ]);
    }
}
