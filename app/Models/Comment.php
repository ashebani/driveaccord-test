<?php

namespace App\Models;

use App\Trait\Bookmarkable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Bookmarkable;

    protected $fillable = [
        'body',
        'commentable_id',
        'commentable_type',
        'user_id',
    ];
    use HasFactory;

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->morphTo(Post::class);
    }

    public function toggleHelpful()
    {
        $like = $this->likes()->where(
            'user_id',
            auth()->id()
        );

        if ($like->exists())
        {
            $like->delete();
        }
        else
        {
            $like->create(['user_id' => auth()->id()]);
        }

    }

    public function likes()
    {
        return $this->morphMany(
            Like::class,
            'markable',
        );
    }

    public function toggleBookmark()
    {
        $bookmark = $this->bookmarks()->where(
            'user_id',
            auth()->id()
        );

        if ($bookmark->exists())
        {
            $bookmark->delete();
        }
        else
        {
            $bookmark->create(['user_id' => auth()->id()]);
        }

    }

    public function bookmarks()
    {
        return $this->morphMany(
            BookMark::class,
            'saveable',
        );
    }

    public function comments()
    {
        return $this->morphMany(
            Comment::class,
            'commentable',
        );
    }
}
