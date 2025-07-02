<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Src\Currency\Currency;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencyIds = Currency::query()->select('id')->get();

        $crDate = date('Y-m-d H:i:s');
        $insertIntoProducts = [];
        for ($i = 0; $i < 120; $i++ ) {
            $randomCurrency = $currencyIds->random();

            $insertIntoProducts[] = [
                'title' => fake()->title,
                'price' => rand(100, 1000),
                'currency_id' => $randomCurrency->id,
                'updated_at' => $crDate,
                'created_at' => $crDate
            ];
        }

        DB::table('products')->insert($insertIntoProducts);
    }
}
