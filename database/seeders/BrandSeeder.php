<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['name' => 'AGS', 'logo' => 'brands/AGS-Logo.png', 'order' => 1],
            ['name' => 'Hanaro Stent', 'logo' => 'brands/hanaro stent.png', 'order' => 2],
            ['name' => 'Hugemed', 'logo' => 'brands/Hugemedlogo.png', 'order' => 3],
            ['name' => 'Shaili Endoscopy', 'logo' => 'brands/shaili endoscopy.png', 'order' => 4],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['name' => $brand['name']],
                [
                    'name' => $brand['name'],
                    'logo' => $brand['logo'],
                    'order' => $brand['order'],
                    'is_active' => true,
                ]
            );
        }
    }
}
