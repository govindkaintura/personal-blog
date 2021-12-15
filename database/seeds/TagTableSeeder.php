<?php

use App\Models\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        $faker = Faker::create('App\Model\Tag');

        for ($i = 0; $i < 10; $i++) {
            $tag_name = $faker->word;
            DB::table('tags')->insert([
                'title' => $tag_name,
                'slug' => Str::slug($tag_name),
                'status' => 1,
            ]);
        }
    }
}