<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $categories = Category::all();

        User::factory()
            ->count(50)
            ->for($categories[rand(0, $categories->count() - 1)])
            ->create();
    }
}
