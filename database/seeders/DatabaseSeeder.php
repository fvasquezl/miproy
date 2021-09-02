<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Faustino Vasquez',
            'email' => 'fvasquez@local.com'
        ]);

        Product::factory()->times(10)->create();
    }
}
