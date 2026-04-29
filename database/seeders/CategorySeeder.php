<?php

namespace Database\Seeders;

use App\Models\Product\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Fishes',
                'image' => 'fish.jpg',
                'icon' => null,
                'description' => 'Fresh and frozen fish, rich in protein and omega‑3.',
            ],
            [
                'name' => 'Vegetables',
                'image' => 'vegetables.jpg',
                'icon' => null,
                'description' => 'Seasonal vegetables for salads, cooking, and healthy meals.',
            ],
            [
                'name' => 'Fruits',
                'image' => 'fruits.jpg',
                'icon' => null,
                'description' => 'Fresh fruits picked for quality and taste.',
            ],
            [
                'name' => 'Meats',
                'image' => 'meats.jpg',
                'icon' => null,
                'description' => 'High-quality meat cuts for everyday cooking.',
            ],
            [
                'name' => 'Frozen',
                'image' => 'frozen.jpg',
                'icon' => null,
                'description' => 'Frozen essentials for quick meals and convenience.',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}

