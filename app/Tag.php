<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $fillable = ['name'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }

    public static function tagsCloud()
    {
        // $tags = (new Post)->with('tags')->get()->pluck('tags')->flatten()->unique('name');
        $tags = Tag::has('posts')->orderBy('name')->get();
        return $tags;
    }
}