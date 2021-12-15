<?php

use App\Models\Article;
use App\Models\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();
        DB::table('article_tag')->truncate();

        $faker = Faker::create('App\Model\Article');

        for ($i = 1; $i < 10; $i++) {

            $title = $faker->sentence;

            DB::table('articles')->insert([
                'title' => $title,
                'slug' => Str::slug($title),
                'desc' => $faker->realText($maxNbChars = 400, $indexSize = 2),
                'thumbnail' => 'front/images/blog-' . $i . '.jpg',
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }

        $articles = Article::all();
        foreach ($articles as $article) {
            DB::table('article_tag')->insert([
                'article_id' => $article->id,
                'tag_id' => Tag::pluck('id')->random(),
            ]);
        }

    }
}