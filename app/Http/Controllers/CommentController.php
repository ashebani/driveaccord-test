<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{

    public function addPost(Request $request, Post $post)
    {

        $attributes = $request->validateWithBag(
            'addComment',
            ['body' => 'required|min:3|max:255']
        );

        $post->comments()->create(
            [
                'user_id' => auth()->id(),
                'body' => $attributes['body'],
            ]
        );

        $post->touch();

        return Redirect::back();

    }

    public function addComment(Request $request, Comment $comment)
    {
        $this->authorize(
            'update',
            $comment
        );
        $attributes = $request->validateWithBag(
            'addComment',
            ['body' => 'required|min:3|max:255']
        );

        $attributes['user_id'] = auth()->id();

        $comment = new Comment($attributes);

        $comment->comments()->save($comment);

        return Redirect::back();

    }

    public function destroy(Comment $comment)
    {
        $post = $comment->post_id;

        $this->authorize(
            'delete',
            $comment
        );
        if ($comment->commentable->solution_comment_id === $comment->id) {
            $comment->commentable()->update(['solution_comment_id' => null]);
        }
        $comment->delete();

        return Redirect::back();
    }
}
