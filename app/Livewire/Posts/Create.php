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

    //    public $tags = '';

    public $description = '';

    public function render()
    {

        return view(
            'livewire.posts.create',
            [
                'categories' => Category::all(),
                'postTags' => Tag::all(),
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

        Post::create(
            [
                'user_id' => auth()->id(),
                'category_id' => $this->category_id,
                'title' => $this->title,
                'description' => $this->description,
            ],
        );

        dd(request()->all());
        //    if (request()->has('tags'))
        //    {
        //        foreach (request()->get('tags') as $tag)
        //        {
        //            $createdPost->tags()->attach($tag);
        //        }
        //    }

        $this->redirect(
            '/posts',
            ['navigate' => true]
        );

    }
}
