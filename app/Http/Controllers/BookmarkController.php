<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookmarkController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $user   = auth()->user();
        $posts  = $user->bookmarks()->paginate(10);

        return view(
            'favorites.index',
            compact('posts')
        );
    }

    //    Save or unsave a post
    public function savePost(Post $post)
    {

        $post->toggleBookmark();

        return Redirect::back();
    }

    public function saveComment(Comment $comment)
    {
        $comment->toggleBookmark();

        return Redirect::back();
    }
}
