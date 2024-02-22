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
                'comments',
                'comments.user',
                'bookmarks',
                'likes',
                'user',
                'tags',
            ]
        )->withCount(
            [
                'comments',
                'likes',
            ]
        )->take(10)->orderBy(
            'comments_count',
            'desc'
        )->get();

        $latestPosts = Post::with(
            [
                'comments',
                'comments.user',
                'bookmarks',
                'likes',
                'user',
                'tags',
            ]
        )->take(10)->get();

        $mostHelpfulPosts = Post::with(
            [
                'comments.likes',
                'bookmarks',
                'tags',
                'likes',
                'user',
            ]
        )->take(10)->get()->sortByDesc(
            'total_likes',
        );

        //        $mostHelpfulPosts = $mostHelpfulPosts->sortBy('total_likes');

        return view(
            'livewire.home.index',
            [
                'latestPosts'      => $latestPosts,
                'mostActivePosts'  => $mostActivePosts,
                'mostHelpfulPosts' => $mostHelpfulPosts,
            ]
        );
    }
}