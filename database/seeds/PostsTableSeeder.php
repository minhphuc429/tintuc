<?php

use Illuminate\Database\Seeder;
use App\Repositories\UserRepository as User;
use App\Repositories\PostRepository as Post;

class PostsTableSeeder extends Seeder
{
    protected $user, $post;

    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = $this->user->findBy('email', 'pv1@homestead.test')->first();
        $author2 = $this->user->findBy('email', 'pv2@homestead.test')->first();
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $post = $this->post->create([
                'title' => $title,
                'content' => $faker->text($maxNbChars = 1000),
                'slug' => str_slug($title),
                'description' => $faker->text($maxNbChars = 200),
                'image' => 'http://via.placeholder.com/640x480',
                'published' => rand(0, 1),
                'user_id' => $author1->id
            ]);
            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $post = $this->post->create([
                'title' => $title,
                'content' => $faker->text($maxNbChars = 1000),
                'slug' => str_slug($title),
                'description' => $faker->text($maxNbChars = 200),
                'image' => 'http://via.placeholder.com/640x480',
                'published' => rand(0, 1),
                'user_id' => $author2->id
            ]);
        }
    }
}
