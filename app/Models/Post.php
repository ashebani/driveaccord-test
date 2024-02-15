<?php

namespace App\Models;

use App\Trait\Bookmarkable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Bookmarkable;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'solution_comment_id',
    ];

    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                $query->where(
                    'title',
                    'like',
                    '%'.$search.'%'
                )->orWhere(
                    'body',
                    'like',
                    '%'.$search.'%'
                );
            }
        );
    }

    public function comments()
    {
        return $this->morphMany(
            Comment::class,
            'commentable'
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
            Bookmark::class,
            'saveable',
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
            'markable'
        );
    }
}
