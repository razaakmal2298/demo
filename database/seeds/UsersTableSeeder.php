<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Akmal',
            'email' => 'test@demo.com',
            'password' => '123456',
            'contact' => '9654490862',
        ]);
    }
}
