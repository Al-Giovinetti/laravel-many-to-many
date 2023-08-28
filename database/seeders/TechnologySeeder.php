<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies=['html','js','php','vue','laravel'];

        foreach($technologies as $technology){
            $newTech = new Technology();
            $newTech->name = $technology;
            $newTech->color = $faker->unique()->hexColor();
            $newTech->save();
;        }
    }
}
