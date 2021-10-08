<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'admin@admin.nl',
            'is_admin' => true
        ]);

        User::factory(rand(100, 1500))
            ->has(Order::factory(rand(1, 3)), 'orders')
            ->create();
    }
}
