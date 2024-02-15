<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentCard extends Component
{
    public $comment;
    public $solution_comment_id;

    public function mount(Comment $comment, $solution_comment_id)
    {
        $this->comment             = $comment;
        $this->solution_comment_id = $solution_comment_id;

    }

    public function bookmark(Comment $model)
    {
        $model->bookmark();
    }

    public function render()
    {
        return view('livewire.comment-card');
    }

    public function helpful(Comment $model)
    {
        $model->helpful();
    }
}
