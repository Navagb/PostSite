<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
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
        Post::factory()->count(30)->create();
        // foreach (Post::all() as $post) {
        //     $category = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
        //     $post->categories()->attach($category);
        // }
    }
}
