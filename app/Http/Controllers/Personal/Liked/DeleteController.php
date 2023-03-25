<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->LikedPosts()->detach($post->id);

        return redirect()->route('liked.index');
    }
}
