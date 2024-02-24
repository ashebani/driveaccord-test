<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Octopy\Impersonate\Concerns\HasImpersonation;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasImpersonation;

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    /**
     * @return string
     */

    public function route(): string
    {
        return '/users/'.$this->id;
    }

    public function getImpersonateDisplayText(): string
    {
        return $this->name;
    }

    /**
     * This following is useful for performing user searches through the interface,
     * You can use fields in relations freely using dot notation,
     * example: posts.title, department.name.
     */
    public function getImpersonateSearchField(): array
    {
        return [
            'name',
            'posts.title',
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(
            Comment::class,
        );
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function savedPosts()
    {
        return $this->belongsToMany(
            Post::class,
            'bookmarks',
            'user_id',
            'saveable_id'
        )->where(
            'saveable_type',
            'App\Models\Post'
        );
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset(
            'storage/avatars/'.$this->image
        ) : 'https://api.dicebear.com/7.x/bottts/svg?seed='.$this->name;
        //            'images/adffff_1707302812.jpg';
    }

    public function getUserPointsAttribute()
    {
        return $this->comments->flatMap->likes->count();
    }
}
