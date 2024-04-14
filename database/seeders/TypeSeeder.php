<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $labels = ["Front-end", "Back-end", "Fullstack"];

        foreach ($labels as $label) {
            $type = new Type();

            $type->label = $label;

            $type->color = $faker->hexColor();

            $type->save();
        }
        
    }
}
