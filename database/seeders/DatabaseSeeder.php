<?php

namespace Database\Seeders;

//use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Products
        $products = Product::factory()->count(10)->create();

        // Orders
        Order::factory()->count(5)->create()->each(function ($order) use ($products){
            $order->products()->attach($products->random(rand(1, 5)));
        });
    }
}
