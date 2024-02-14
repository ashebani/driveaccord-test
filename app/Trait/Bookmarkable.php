<?php

namespace App\Trait;

trait Bookmarkable
{

    public function bookmark()
    {
        $bookmark = $this->bookmarks()->where(
            'user_id',
            '=',
            auth()->id()
        );

        if ($bookmark->exists())
        {
            $bookmark->delete();
        }
        else
        {
            $this->bookmarks()->create(['user_id' => auth()->id()]);
        }
    }

    public function helpful()
    {
        $helpful_mark = $this->likes()->where(
            'user_id',
            '=',
            auth()->id()
        );

        if ($helpful_mark->exists())
        {
            $helpful_mark->delete();
        }
        else
        {
            $this->likes()->create(['user_id' => auth()->id()]);
        }
    }
}
