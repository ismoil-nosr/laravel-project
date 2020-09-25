<?php

/**
 * Syncs tags with post
 * @param App\Post $post - post model
 * @return void
 */

function syncTags(App\Post $post): void
{
    //adding tags
    $tagsFromInput = explode(',', request('tags')); // make an array from input
    $tagNames = array_map('trim', $tagsFromInput); // trim spaces to avoid duplicating
    $tagIds = [];

    foreach ($tagNames as $tagName) {
        $tag = App\Tag::firstOrCreate(['name' => $tagName]);
        $tagIds[] = $tag->id;
    }

    $post->tags()->sync($tagIds); // sync to avoid duplicating tags in db

    return;
}