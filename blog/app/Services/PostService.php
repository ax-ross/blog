<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        DB::transaction(function () use ($data) {
            if (isset($data['tag_ids'])) {
                $tag_ids = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::create($data);
            if (isset($data['tag_ids'])) {
                $post->tags()->attach($tag_ids);
            }
        });
    }

    public function update($post, $data)
    {
        DB::transaction(function () use ($post, $data) {
            if (isset($data['tag_ids'])) {
                $tag_ids = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            !(isset($data['preview_image'])) || (($data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image'])));
            !(isset($data['main_image'])) || ($data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']));
            $post->update($data);
            if (isset($data['tag_ids'])) {
                $post->tags()->sync($tag_ids);
            }
        });
    }
}
