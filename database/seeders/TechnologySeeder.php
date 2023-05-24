<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologies = ['Html', 
                            'Php',
                            'CSS',
                            'SASS', 
                            'Figma', 
                            'Laravel', 
                            'JavaScript',
                            'Vue',
                            'Vite',
                            'bootstrap',
                        ];
        foreach($technologies as $technology){
            $newTechnology = new Technology();

            $newTechnology->name = $technology;
            $newTechnology->description = $faker->text();
            $newTechnology->color = $faker->hexColor();

            $newTechnology->save();
        };
    }
}
