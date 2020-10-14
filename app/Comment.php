<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'author_id'];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'commentable');
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
