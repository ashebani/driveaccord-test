<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{

    //    Mark a post as helpful
    public function likePost(Post $post)
    {
        $post->toggleHelpful();

        return redirect('/posts/'.$post->id);
    }

    public function likeComment(Comment $comment)
    {
        $comment->toggleHelpful();

        return Redirect::back();
    }

}
