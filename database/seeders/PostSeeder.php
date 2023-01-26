<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

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
                "text" => Arr::join($faker->sentences(random_int(3, 20)), "\n\n"),
                "created_at" => $date = $faker->dateTimeBetween("-1 year", "now"),
                "updated_at" => $date,
            ]);
        }
    }
}
