<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'name' => 'Akmal',
            'contact' => '9654490862',
            'pincode' => 110017,
            'country' => 'India',
            'state' => 'Delhi',
            'address' => 'J-65, Saket',
            'address_type' => 1,
            'user_id' => 1
        ]);

        DB::table('addresses')->insert([
            'name' => 'Sarim',
            'contact' => '9654490862',
            'pincode' => 110025,
            'country' => 'India',
            'state' => 'Delhi',
            'address' => 'Zakir nagar',
            'address_type' => 2,
            'user_id' => 1
        ]);


    }
}
