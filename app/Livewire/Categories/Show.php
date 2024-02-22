<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $category;
    public $search = '';
    public $solved;
    public $sortDirection = 'asc';

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {

        $posts = $this->category->posts()->with(
            [
                'bookmarks',
                'likes',
                'comments',
                'user',
                'tags',
            ]
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
            'livewire.categories.show',
            ['posts' => $posts->paginate()]
        );
    }

    public function sortBy($direction)
    {
        $this->sortDirection = $direction;
    }

    public function toggleSolved()
    {
        $this->solved = ! $this->solved;
    }

}
