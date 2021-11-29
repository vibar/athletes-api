<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Football', 'properties' => ['foot', 'position']],
            ['name' => 'Karate', 'properties' => ['belt', 'style']],
            ['name' => 'Tennis', 'properties' => ['hand', 'rank']],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
