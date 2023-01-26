<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();


        foreach (range(0, 100) as $i) {

            Post::create([
                "name" => $faker->name,
                "text" => $faker->realTextBetween(50, 200),
            ]);
        }
    }
}
