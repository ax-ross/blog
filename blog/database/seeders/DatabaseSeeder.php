<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(10)->create();
        $tags = Tag::factory(30)->create();
        Post::factory()->count(30)->state(new Sequence(fn ($sequence)=> ['category_id' => $categories->random()]))->create()->each(function ($post) use ($tags) {
            $post->tags()->attach($tags->random(3));
        });
        $this->call(AdminUserSeeder::class);
    }
}
