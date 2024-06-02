<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Functions\Helper as Help;
use Faker\Generator as Faker;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 75; $i++) {
            $new_item = new Project();
            $new_item->type_id = Type::inRandomOrder()->first()->id;
            $new_item->title = $faker->words(1, true);
            $new_item->slug = Help::generateSlug($new_item->title, Project::class);
            // $new_item->technology_id = Technology::inRandomOrder()->first()->id;
            $new_item->github_url = Help::generateGithubUrl($faker);

            $new_item->save();
        }
    }
}
