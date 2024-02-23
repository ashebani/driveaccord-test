<?php

namespace App\Models;

use App\Trait\Bookmarkable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use Bookmarkable, Sluggable;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
        'solution_comment_id',
    ];

    protected $appends = ['total_likes'];
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                $query->where(
                    'title',
                    'like',
                    '%' . $search . '%'
                )->orWhere(
                    'body',
                    'like',
                    '%' . $search . '%'
                );
            }
        );
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //scope count of Likes From Posts And Comments
    public function getTotalLikesAttribute()
    {
        return $this->likes->count() +

        $this->comments->flatMap->likes->count();
    }

    public function likes()
    {
        return $this->morphMany(
            Like::class,
            'markable'
        );
    }

    public function comments()
    {
        return $this->morphMany(
            Comment::class,
            'commentable'
        );
    }
}
