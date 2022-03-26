<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Seeder;

class AnimalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animals_values = [
            [
                'name' => 'Simon',
                'kind' => 'cat',
                'max_size' => 30,
                'max_age' => 12,
                'image_src' => 'cherepavel.jpg',
                'growth_factor' => 1.3
            ],
            [
                'name' => 'Tom',
                'kind' => 'dog',
                'max_size' => 50,
                'max_age' => 15,
                'image_src' => 'cherepavel.jpg',
                'growth_factor' => 1.5
            ],
            [
                'name' => 'Kate',
                'kind' => 'python',
                'max_size' => 75,
                'max_age' => 30,
                'image_src' => 'cherepavel.jpg',
                'growth_factor' => 0.8
            ],
            [
                'name' => 'Rose',
                'kind' => 'goat',
                'max_size' => 65,
                'max_age' => 10,
                'image_src' => 'cherepavel.jpg',
                'growth_factor' => 1.1
            ]
        ];

        foreach ($animals_values as $animals_value)
        {
            Animal::query()
                ->updateOrCreate(
                    [
                        'kind' => $animals_value['kind']
                    ],
                    $animals_value
                );
        }

    }
}
