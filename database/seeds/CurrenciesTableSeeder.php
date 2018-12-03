<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'country_id' => 'in',
            'name' => 'Indian Rupees',
            'symbol' => '₹',
            'conversion_rate' => 1,
        ]);

        DB::table('currencies')->insert([
            'country_id' => 'usa',
            'name' => 'American Dollar',
            'symbol' => '$',
            'conversion_rate' => 0.014,
        ]);

        DB::table('currencies')->insert([
            'country_id' => 'eu',
            'name' => 'Europian Euro',
            'symbol' => '€',
            'conversion_rate' => 0.012,
        ]);
    }
}
