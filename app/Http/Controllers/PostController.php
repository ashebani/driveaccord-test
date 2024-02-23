<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $this->authorize(
            'delete',
            $post
        );

        $post->delete();

        return Redirect::to('/posts');
    }

    public function PostSolved(Request $request, Post $post)
    {
        $this->authorize(
            'update',
            $post
        );
        $request->validateWithBag(
            'addComment',
            ['body' => 'required|min:5']
        );

        $comment = $post->comments()->create(
            [
                'user_id' => auth()->id(),
                'body'    => $request->get('body'),
            ]
        );
        $post->update(['solution_comment_id' => $comment->id]);

        return Redirect::back();
    }

    public function CommentSolved(Request $request, Comment $comment)
    {
        $this->authorize(
            'update',
            $comment
        );
        $comment->commentable()->update(['solution_comment_id' => $comment->id]);

        //        $comment->post()->update(['solution_comment_id' => $comment->id]);

        return Redirect::back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('upload'))
        {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName   = pathinfo(
                $originName,
                PATHINFO_FILENAME
            );
            $extension  = $request->file('upload')->getClientOriginalExtension();
            $fileName   = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(
                public_path('media'),
                $fileName
            );

            $url = asset('media/'.$fileName);

            return response()->json(
                [
                    'filename' => $fileName,
                    'uploaded' => 1,
                    'url'      => $url,
                ]
            );
        }
    }
}