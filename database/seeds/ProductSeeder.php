<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Seeder;

use App\Product;

class ProductSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 3; $i++) {
            $product = new Product;
            $product->name = $faker->name;
            $product->price = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL);
            $product->save();
        }
    }
}