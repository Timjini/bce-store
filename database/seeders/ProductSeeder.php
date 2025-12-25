<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Assuming you have some product categories already seeded
        $categoryIds = DB::table('product_categories')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $name = $faker->words(3, true); // 3-word product name
            DB::table('products')->insert([
                'id' => Str::uuid(),
                'name' => ucfirst($name),
                'slug' => Str::slug($name . '-' . Str::random(5)),
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 100, 10000), // industrial product price
                'sku' => strtoupper(Str::random(8)),
                'stock' => $faker->numberBetween(0, 500),
                'is_active' => $faker->boolean(90), // 90% chance active
                'is_featured' => $faker->boolean(20), // 20% chance featured
                'specifications' => json_encode([
                    'weight' => $faker->randomFloat(2, 1, 100) . ' kg',
                    'power' => $faker->numberBetween(100, 5000) . ' W',
                    'material' => $faker->randomElement(['Steel', 'Aluminum', 'Plastic', 'Composite']),
                ]),
                'product_category_id' => $faker->randomElement($categoryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
