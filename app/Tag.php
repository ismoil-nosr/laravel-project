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
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public static function tagsCloud()
    {
        $tags = Tag::whereHas('posts', function($q) {
            $q->where('published', true);
        })->get();

        return $tags;
    }
}