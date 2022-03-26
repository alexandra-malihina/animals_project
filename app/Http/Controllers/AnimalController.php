<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{    
    /**
     * getAnimals - получение списка животных
     *
     * @return void
     */
    public function getAnimals()
    {
        return Animal::query()
            ->get();
    }

    
    
    /**
     * addAnimal - создать новое животное
     *
     * @param  mixed $request
     * @return void
     */
    public function addAnimal(Request $request)
    {
        $animal_id = $request->post('animal_id') ?? 0;

        $animal = Animal::query()
            ->find($animal_id);

        if (empty($animal))
        {
            $result = [
                'error' => 'Нет животного в системе',
                'data' => []
            ];
            return response($result);
        }

        $animal->size = 0;
        $animal->age = 0;
        $animal->progress = 0;

        $result = [
            'error' => null,
            'data' => $animal
        ];
        return response($result);
    }


    
    /**
     * ageAnimal  - состарить животное
     *
     * @param  mixed $request
     * @return void
     */
    public function ageAnimal(Request $request)
    {
        $animal_id = $request->post('animal_id') ?? 0;
        $animal_size = $request->post('size') ?? 0;
        $animal_age = $request->post('age') ?? 0;

        $animal = Animal::query()
            ->find($animal_id);
        
        if (empty($animal))
        {
            $result = [
                'error' => 'Нет животного в системе',
                'data' => []
            ];
            return $result;
        }
        
        if ($animal_age < $animal->max_age)
        {
            $animal_age++;
            if ($animal_size < $animal->max_size)
            {
                $animal_size = number_format($animal_size + $animal_age * $animal->growth_factor, 1);
                if ($animal_size > $animal->max_size)
                {
                    $animal_size = $animal->max_size;
                }
            }
            
        }

        $result = [ 
            'error' => null,
            'data' => [
                'animal_id' => $animal_id,
                'size' => $animal_size,
                'age' => $animal_age,
                'progress' => intval( $animal_age/ $animal->max_age * 100),
                'size_progress' => intval( $animal_size/ $animal->max_size * 100)
            ]
        ];

        return $result;
    }
}
