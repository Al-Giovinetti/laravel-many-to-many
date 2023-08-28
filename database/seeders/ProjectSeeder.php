<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0;$i<100;$i++){
            $newProject = new Project();
            $newProject -> title = ucfirst($faker -> unique() -> words(5,true));
            $newProject -> image = $faker->imageUrl(640, 480, 'animals', true);
            $newProject -> description = $faker -> paragraph(1);
            $newProject -> attachments = $faker ->  numberBetween(1, 30);
            $newProject -> save();
        }
    }
}
