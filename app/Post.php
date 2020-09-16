<?php

namespace App;

class Post extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published', false);
    }
}
