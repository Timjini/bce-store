<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Industrial Motors',
                'description' => 'High-performance motors used in industrial machinery for driving equipment and processes efficiently.',
            ],
            [
                'name' => 'Hydraulic Pumps',
                'description' => 'Pumps that provide hydraulic power for various industrial applications, including manufacturing and construction equipment.',
            ],
            [
                'name' => 'Conveyor Belts',
                'description' => 'Durable belts used in material handling systems to transport goods efficiently across industrial facilities.',
            ],
            [
                'name' => 'Industrial Valves',
                'description' => 'Valves designed to control the flow of liquids or gases in industrial pipelines and machinery.',
            ],
            [
                'name' => 'Compressors',
                'description' => 'Devices that increase the pressure of air or gas, essential for various industrial processes.',
            ],
            [
                'name' => 'Bearings & Gears',
                'description' => 'Mechanical components that reduce friction and transfer motion in machines and industrial equipment.',
            ],
            [
                'name' => 'Electric Generators',
                'description' => 'Machines that convert mechanical energy into electrical energy for industrial power supply.',
            ],
            [
                'name' => 'Industrial Sensors',
                'description' => 'Sensors used for monitoring and controlling industrial processes, including temperature, pressure, and motion sensors.',
            ],
            [
                'name' => 'Safety Equipment',
                'description' => 'Protective gear and devices ensuring worker safety in industrial environments.',
            ],
            [
                'name' => 'Control Panels',
                'description' => 'Electrical panels used to manage and automate machinery and industrial systems.',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('product_categories')->insert([
                'id' => Str::uuid(),
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
