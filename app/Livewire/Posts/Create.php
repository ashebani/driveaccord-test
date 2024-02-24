<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Create extends Component
{

    public $title = '';

    public $category_id = '';

    public $tags = '';

    public $description = '';

    public function render()
    {
        $tags = Tag::all()->toArray();

        return view(
            'livewire.posts.create',
            [
                'categories' => Category::all(),
                'postTags' => $tags,
            ]
        );
    }

    public function save()
    {
        //        TODO:: Fix tags issue where the array has only one tag

        $validated = $this->validate([
            'title' => 'required|min:3',
            'category_id' => 'required',
            'description' => 'required|min:3',
        ]);

        $createdPost = Post::create(
            [
                'user_id' => auth()->id(),
                'category_id' => $this->category_id,
                'title' => $this->title,
                'description' => $this->description,
            ],
        );

        if (!is_null($this->tags)) {
            # code...
            $createdPost->tags()->sync($this->tags);
        }

        $this->redirect(
            '/posts',
            ['navigate' => true]
        );

    }
}
