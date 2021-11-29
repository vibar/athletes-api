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

        $propertyValues = [
            'foot' => ['left', 'right'][rand(0,1)],
            'position' => ['goalkeeper', 'defender', 'midfielder', 'forward'][rand(0,3)],
            'belt' => ['white', 'orange', 'blue', 'yellow', 'green', 'brown', 'black'][rand(0, 6)],
            'style' => ['shotokan', 'shorin-ryu', 'ashihara'][rand(0, 2)],
            'hand' => ['left', 'right'][rand(0,1)],
            'rank' => rand(1, 100),
        ];

        foreach ($categories as $category) {

            User::factory([
                'properties' => function () use ($category, $propertyValues) {
                    $value = [];
                    foreach ($category->properties as $property) {
                        $value[$property] = $propertyValues[$property];
                    }
                    return $value;
                },
            ])
                ->count(rand(10, 20))
                ->for($category)
                ->create();
        }
    }
}
