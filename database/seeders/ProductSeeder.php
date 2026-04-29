<?php

namespace Database\Seeders;

use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = fake();

        $categoryIdByName = Category::query()
            ->pluck('id', 'name')
            ->all();

        $catalog = [
            // item_id mapping used in ProductsController@shop:
            // 1=fishes, 2=vegetables, 3=fruits, 4=meats
            [
                'name' => 'Atlantic Salmon Fillet',
                'image' => 'fish.jpg',
                'price' => 14.99,
                'category' => 'Fishes',
                'item_id' => 1,
            ],
            [
                'name' => 'Tilapia Fillet',
                'image' => 'fish.jpg',
                'price' => 8.50,
                'category' => 'Fishes',
                'item_id' => 1,
            ],
            [
                'name' => 'Fresh Shrimp (500g)',
                'image' => 'fish.jpg',
                'price' => 11.25,
                'category' => 'Fishes',
                'item_id' => 1,
            ],
            [
                'name' => 'Tomatoes (1kg)',
                'image' => 'vegetables.jpg',
                'price' => 2.30,
                'category' => 'Vegetables',
                'item_id' => 2,
            ],
            [
                'name' => 'Cucumbers (1kg)',
                'image' => 'vegetables.jpg',
                'price' => 1.90,
                'category' => 'Vegetables',
                'item_id' => 2,
            ],
            [
                'name' => 'Potatoes (2kg)',
                'image' => 'vegetables.jpg',
                'price' => 3.10,
                'category' => 'Vegetables',
                'item_id' => 2,
            ],
            [
                'name' => 'Bananas (1kg)',
                'image' => 'fruits.jpg',
                'price' => 2.15,
                'category' => 'Fruits',
                'item_id' => 3,
            ],
            [
                'name' => 'Apples (1kg)',
                'image' => 'fruits.jpg',
                'price' => 2.75,
                'category' => 'Fruits',
                'item_id' => 3,
            ],
            [
                'name' => 'Oranges (1kg)',
                'image' => 'fruits.jpg',
                'price' => 2.40,
                'category' => 'Fruits',
                'item_id' => 3,
            ],
            [
                'name' => 'Beef Mince (500g)',
                'image' => 'meats.jpg',
                'price' => 6.99,
                'category' => 'Meats',
                'item_id' => 4,
            ],
            [
                'name' => 'Chicken Breast (1kg)',
                'image' => 'meats.jpg',
                'price' => 7.80,
                'category' => 'Meats',
                'item_id' => 4,
            ],
            [
                'name' => 'Lamb Chops (500g)',
                'image' => 'meats.jpg',
                'price' => 9.60,
                'category' => 'Meats',
                'item_id' => 4,
            ],
            [
                'name' => 'Frozen Mixed Vegetables (1kg)',
                'image' => 'frozen.jpg',
                'price' => 3.85,
                'category' => 'Frozen',
                'item_id' => 2,
            ],
            [
                'name' => 'Frozen Fries (1kg)',
                'image' => 'frozen.jpg',
                'price' => 3.20,
                'category' => 'Frozen',
                'item_id' => 2,
            ],
        ];

        foreach ($catalog as $p) {
            $categoryId = $categoryIdByName[$p['category']] ?? null;
            $expDate = $faker->optional(0.75)->dateTimeBetween('+7 days', '+120 days');

            Product::firstOrCreate(
                ['name' => $p['name']],
                [
                    'image' => $p['image'],
                    'description' => $faker->sentence(12),
                    'price' => $p['price'],
                    'exp_date' => $expDate ? $expDate->format('Y-m-d') : null,
                    'item_id' => $p['item_id'],
                    'category_id' => $categoryId,
                ]
            );
        }
    }
}

