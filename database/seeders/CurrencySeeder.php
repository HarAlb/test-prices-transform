<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $currencies = [
           [
               'iso_name' => 'RUB',
               'icon' => '₽',
               'conversion_rate' => 1,
           ],
           [
               'iso_name' => 'USD',
               'icon' => '$',
               'conversion_rate' => 1.50,
           ],
           [
               'iso_name' => 'EUR',
               'icon' => '€',
               'conversion_rate' => 2.00,
           ]
       ];
       $crDate = date('Y-m-d H:i:s');

       foreach ($currencies as $currency){
           $currency['updated_at'] = $currency['created_at'] = $crDate;
       }

       DB::table('currencies')->insert($currencies);
    }
}
