<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
            'likes',
            'tags'
        );

        $posts->when(
            $this->solved,
            function ($query) {
                $query->whereNotNull(
                    'solution_comment_id'
                );
            }
        );

        // Search

        $posts->when(
            $this->search,
            function ($query) {
                $query->where(function ($query) {
                    $this->resetPage();

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
        );

        // Sort Direction
        $posts->when(
            $this->sortDirection === 'desc',
            function ($query) {
                return $query->oldest();
            }
        );
        $posts->when(
            $this->sortDirection === 'asc',
            function ($query) {
                return $query->latest();
            }
        );

        return view(
            'livewire.posts.index',
            [
                'posts'      => $posts->paginate(10),
                'tags'       => Tag::all(),
                'categories' => Category::all(),

            ]
        );
    }

    public function toggleSolved()
    {
        $this->solved = ! $this->solved;
    }

}
