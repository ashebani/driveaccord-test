<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $countOfSolvedPosts = Post::whereHas(
            'comments',
            function ($query) use ($user) {
                $query->whereIn(
                    'solution_comment_id',
                    Comment::all()->where(
                        'user_id',
                        $user->id
                    )->pluck('id')
                );
            }
        )->get()->count();

        return view(
            'users.show',
            [
                'countOfSolvedPosts' => $countOfSolvedPosts,
                'points'             => $user->userPoints(),
                'user'               => $user,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
