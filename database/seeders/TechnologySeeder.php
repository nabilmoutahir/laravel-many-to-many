<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $techs = ['HTML5', 'CSS3', 'Javascript ES5', 'VueJS 3', 'PHP', 'Json', 'Laravel', 'Bootstrap', 'Blade', 'Git'];


        foreach($techs as $tech) {
            $technology = new Technology();

            $technology->label = $tech;
            $technology->color = $faker->hexColor();

            $technology->save();
        }


    }
}
