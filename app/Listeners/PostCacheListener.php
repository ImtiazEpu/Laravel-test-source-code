<?php

namespace App\Listeners;

use App\Models\Post;

class PostCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        cache()->forget('articles');
        $posts = Post::with('user','category')->orderBy('created_at', 'desc')->take(100)->get();
        cache()->forever('articles', $posts);
    }
}
