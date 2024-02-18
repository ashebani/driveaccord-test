<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $solved;
    public $sortDirection = 'asc';

    public function bookmark(Post $model)
    {
        $model->bookmark();
    }

    public function delete(Post $post)
    {
        $this->authorize(
            'delete',
            $post
        );
        $post->delete();
    }

    public function sortBy($direction)
    {
        $this->sortDirection = $direction;
    }

    public function render()
    {

        $posts = Post::with(
            'comments',
            'user',
            'bookmarks',
            'likes'
        );

        if ($this->solved === true)
        {
            $posts->whereNotNull(
                'solution_comment_id'
            );
        }
        // Search
        if ($this->search)
        {
            $posts->where(function ($query) {
                $query->where(
                    'title',
                    'like',
                    '%'.$this->search.'%'
                )->orWhere(
                    'description',
                    'like',
                    '%'.$this->search.'%'
                );
            });

        }
        // Sort Direction
        if ($this->sortDirection === 'desc')
        {
            $posts->oldest();
        }
        elseif ($this->sortDirection === 'asc')
        {
            $posts->latest();
        }

        return view(
            'livewire.posts.index',
            [
                'posts'      => $posts->paginate(10),
                'categories' => Category::all(),
            ]
        );
    }

    public function toggleSolved()
    {
        $this->solved = ! $this->solved;
    }
}
