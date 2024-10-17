<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConferenceController;
use App\Models\ConferenceSpeaker;

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

    Route::get('/dashboard/event/create', [EventController::class, 'create'])
        ->name('event.create');

    Route::post('/dashboard/event/store', [EventController::class, 'store'])
        ->name('event.store');

    Route::get('/dashboard/event/{event}', [EventController::class, 'showEvent'])
        ->name('event.show');

    Route::delete('/dashboard/event/{event}/delete', [EventController::class, 'delete'])
        ->name('event.delete');

    Route::get('/dashboard/event/{event}/edit', [EventController::class, 'edit'])
        ->name('event.edit');

    Route::put('/dashboard/event/{event}/update', [EventController::class, 'update'])
        ->name('event.update');

    Route::get('/dashboard/conferences', [ConferenceController::class, 'index'])
        ->name('conferences');

    Route::get('/dashboard/conference/create', [ConferenceController::class, 'create'])
        ->name('conference.create');

    Route::get('/dashboard/conference/{conference}', [ConferenceController::class, 'showConference'])
        ->name('conference.show');

    Route::post('/dashboard/conference/store', [ConferenceController::class, 'store'])
        ->name('conference.store');

    Route::delete('/dashboard/conference/{conference}/delete', [ConferenceController::class, 'delete'])
        ->name('conference.delete');

    Route::get('/dashboard/conference/{conference}/edit', [ConferenceController::class, 'edit'])
        ->name('conference.edit');

    Route::put('/dashboard/conference/{conference}/update', [ConferenceController::class, 'update'])
        ->name('conference.update');

    Route::get('/dashboard/speakers', [SpeakerController::class, 'index'])
        ->name('speakers');

    Route::post('/dashboard/event/assignSpeaker', [EventController::class, 'assignSpeaker'])
        ->name('speaker.event.assign');

    Route::get('/dashboard/event/assignSpeaker/{event}', [EventController::class, 'showAssignForm'])
        ->name('speaker.event.assign.form');

    Route::post('/dashboard/conference/assignSpeaker', [ConferenceSpeaker::class, 'assignSpeaker'])
        ->name('speaker.conference.assign');

    Route::get('/dashboard/conference/assignSpeaker/{conference}', [ConferenceSpeaker::class, 'showAssign'])
        ->name('speaker.conference.assign.form');

    Route::get('/dashboard/speaker/event/create', [SpeakerController::class, 'createEventSpeaker'])
        ->name('speaker.event.create');

    Route::post('/dashboard/speaker/event/store', [SpeakerController::class, 'storeEventSpeaker'])
        ->name('speaker.event.store');

    Route::get('/dashboard/speaker/event/edit/{eventSpeaker}', [SpeakerController::class, 'editEventSpeaker'])
        ->name('speaker.event.edit');

    Route::put('/dashboard/speaker/event/update/{eventSpeaker}', [SpeakerController::class, 'updateEventSpeaker'])
        ->name('speaker.event.update');

    Route::get('/dashboard/speaker/conference/create', [SpeakerController::class, 'createConferenceSpeaker'])
        ->name('speaker.conference.create');

    Route::post('/dashboard/speaker/conference/store', [SpeakerController::class, 'storeConferenceSpeaker'])
        ->name('speaker.conference.store');

    Route::get('/dashboard/speaker/conference/edit/{conferenceSpeaker}', [SpeakerController::class, 'editConferenceSpeaker'])
        ->name('speaker.conference.edit');

    Route::put('/dashboard/speaker/conference/update/{conferenceSpeaker}', [SpeakerController::class, 'updateConferenceSpeaker'])
        ->name('speaker.conference.update');

    Route::delete('/dashboard/speaker/event/delete/{eventSpeaker}', [SpeakerController::class, 'deleteEventSpeaker'])
        ->name('speaker.event.delete');

    Route::delete('/dashboard/speaker/conference/delete/{conferenceSpeaker}', [SpeakerController::class, 'deleteConferenceSpeaker'])
        ->name('speaker.conference.delete');
});
