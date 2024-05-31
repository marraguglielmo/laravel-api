<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
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
            $new_item->languages = $faker->words(1, true);
            $new_item->github_url = Help::generateGithubUrl($faker);

            $new_item->save();
        }
    }
}



    // foreach ($data as $item) {
    //     $new_item = new Project();
    //     $new_item->type_id = Type::inRandomOrder()->first()->id;
    //     $new_item->title = $item['name'];
    //     $new_item->languages = implode(', ', $item['languages']);
    //     $new_item->github_url = $item['git_hub_url'];
    //     $new_item->slug = Help::generateSlug($new_item->title, Project::class);
    //     $new_item->save();
    // }
