<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $mostActivePosts = Post::with(
            [
                'user',
                'comments.likes',
                'bookmarks',
                'tags',
            ]
        )->withCount(
            [
                'comments',
            ]
        )->take(10)->orderBy(
            'comments_count',
            'desc'
        )->get();

        $latestPosts = Post::with(
            [
                'comments.likes',
                'bookmarks',
                'user',
                'tags',
            ]
        )->take(10)->get();

        $mostHelpfulPosts = Post::with(
            [
                'comments.likes',
                'comments.bookmarks',
                'likes',
                'bookmarks',
                'user',
                'tags',
            ]
        )->take(10)->get()->sortByDesc(
            'total_likes',
        );

        return view(
            'livewire.home.index',
            [
                'latestPosts'      => $latestPosts,
                'mostActivePosts'  => $mostActivePosts,
                'mostHelpfulPosts' => $mostHelpfulPosts,
                //                'latestPosts'      => $latestPosts,
                //                'mostActivePosts'  => $latestPosts,
                //                'mostHelpfulPosts'  => $mostHelpfulPosts,
            ]
        );
    }

    public function bookmark(Post $model)
    {
        $model->bookmark();
    }
}
