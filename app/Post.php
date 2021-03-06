<?php

namespace App;

use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasSlug;

    protected $fillable = ['title', 'body', 'slug', 'author_id', 'published'];
    
    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function(Post $post) {
            $after = $post->getDirty();
            $post->history()->attach(auth()->id(), [
                'before' => json_encode(Arr::only($post->fresh()->toArray(), array_keys($after)), JSON_UNESCAPED_UNICODE),
                'after' => json_encode($after, JSON_UNESCAPED_UNICODE)
            ]);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50)
            ->doNotGenerateSlugsOnUpdate();
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published', false);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        return $this->belongsToMany(User::class, 'post_histories')
             ->withPivot(['before', 'after'])
             ->withTimestamps();
    }
    
    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }
}
