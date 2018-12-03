<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Men Charcoal',
            'description' => 'A pair of round-toe charcoal grey running shoes, has lace-up detail',
            'price' => 2500,
            'sku' => 'abc1',
            'status' => 1,
            'company' => 'puma',
            'image' => 'images/find-parts.png',
            'type' => 'shoes'
        ]);

        DB::table('products')->insert([
            'name' => 'Men Grey Trenzo IDP Training Shoes',
            'description' => 'A pair of round-toe charcoal grey running shoes, has lace-up detail',
            'price' => 3500,
            'sku' => 'abc2',
            'status' => 1,
            'company' => 'puma',
            'image' => 'images/manual.png',
            'type' => 'shoes'
        ]);

        DB::table('products')->insert([
            'name' => 'Grey & Red Sigma IDP Training Shoes',
            'description' => 'A pair of charcoal grey and red training shoes',
            'price' => 2500,
            'sku' => 'abc3',
            'status' => 1,
            'company' => 'puma',
            'image' => 'images/system-accessories.png',
            'type' => 'shoes'
        ]);

        DB::table('products')->insert([
            'name' => 'Men Blue Sigma Running Shoes',
            'description' => 'A pair of blue running sports shoes, has regular styling, lace-up detail
Mesh upper',
            'price' => 4500,
            'sku' => 'abc4',
            'status' => 1,
            'company' => 'puma',
            'image' => 'images/technical-support.png',
            'type' => 'shoes'
        ]);

    }
}
