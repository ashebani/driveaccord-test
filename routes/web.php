<?php

use App\Http\Controllers\BookmarkController;use App\Http\Controllers\CategoryController;use App\Http\Controllers\CommentController;use App\Http\Controllers\FavoriteController;use App\Http\Controllers\LikeController;use App\Http\Controllers\PostController;use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('posts', PostController::class)->except(['index', 'show', 'create']);
    Route::get('posts/create', \App\Livewire\Posts\Create::class)->name('posts.create');

    //    Add a comment
    Route::post('/posts/{post}/comments', [CommentController::class, 'addPost']);

    Route::post('/comments/{comment}/comments', [CommentController::class, 'addComment']);

    Route::post('/upload', [PostController::class, 'upload'])->name('ckeditor.upload');

    //    Delete a comment
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);

    //    Mark Comment as Solution
    Route::post('/posts/{post}/comments/solution', [PostController::class, 'PostSolved']);

   //    Mark Post as Solved And Add a Comment as Solution
    Route::post('/comments/{comment}/comments/solution', [PostController::class, 'CommentSolved']);

    //    Mark a post as helpful
    Route::post('/posts/{post}/like', [LikeController::class, 'likePost'])->name('likePost');

    //    Mark a post as helpful
    Route::post('/comments/{comment}/like', [LikeController::class, 'likeComment'])->name('likeComment');

    //    Save or unsave a post
    Route::post('/comments/{comment}/save', [BookmarkController::class, 'saveComment'])->name('saveComment');

});
    Route::get('/categories', [CategoryController::class, 'index'])->name('home');
    Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::get('/posts', \App\Livewire\Posts\Index::class)->name('posts.index');
    Route::get('/posts/{post}', \App\Livewire\Posts\Show::class)->name('posts.show');

require __DIR__.'/auth.php';
