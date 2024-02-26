<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;

    }

    public function bookmark(Post $model)
    {
        $model->bookmark();
    }

    public function render()
    {
        //        $model
        return view(
            'livewire.posts.show',
            [
                'comments' => $this->post->comments()->with(
                    [
                        'likes',
                        'bookmarks',
                    ]
                )->simplePaginate(10),
            ]
        );
    }

    public function helpful(Post $model)
    {
        $model->helpful();
    }
}
