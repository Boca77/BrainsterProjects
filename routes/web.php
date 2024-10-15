<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('home');
});

Route::get('/loginForm', [LoginController::class, 'index'])
    ->name('login.form');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::middleware('checkIsUserAdmin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/users', [UserController::class, 'index'])
        ->name('users');

    Route::delete('/dashboard/user/{user}/delete', [UserController::class, 'delete'])
        ->name('user.delete');

    Route::get('/dashboard/user/{user}', [UserController::class, 'showUser'])
        ->name('user.show');

    Route::post('/dashboard/user/{user}/ban', [UserController::class, 'ban'])
        ->name('user.ban');

    Route::post('/dashboard/user/{user}/unban', [UserController::class, 'unban'])
        ->name('user.unban');

    Route::get('/dashboard/blogs', [BlogController::class, 'index'])
        ->name('blogs');

    Route::get('/dashboard/blogs/create', [BlogController::class, 'create'])
        ->name('blog.create');

    Route::post('/dashboard/blogs/store', [BlogController::class, 'store'])
        ->name('blog.store');

    Route::get('/dashboard/blogs/{blog}/edit', [BlogController::class, 'edit'])
        ->name('blog.edit');

    Route::put('/dashboard/blogs/{blog}/update', [BlogController::class, 'update'])
        ->name('blog.update');

    Route::delete('/dashboard/blogs/{blog}/delete', [BlogController::class, 'delete'])
        ->name('blog.delete');

    Route::get('/dashboard/blogs/{blog}', [BlogController::class, 'showBlog'])
        ->name('blog.show');

    Route::get('/dashboard/comments', [CommentController::class, 'index'])
        ->name('comments');

    Route::delete('/dashboard/comment/{comment}', [CommentController::class, 'delete'])
        ->name('comment.delete');

    Route::get('/dashboard/events', [EventController::class, 'index'])
        ->name('events');

    Route::get('/dashboard/event/{event}', [EventController::class, 'showEvent'])
        ->name('event.show');

    Route::delete('/dashboard/event/{event}/delete', [EventController::class, 'delete'])
        ->name('event.delete');

    Route::get('/dashboard/event/{event}/edit', [EventController::class, 'edit'])
        ->name('event.edit');

    Route::put('/dashboard/event/{event}/update', [EventController::class, 'update'])
        ->name('event.update');
});
