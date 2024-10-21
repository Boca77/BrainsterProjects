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
use App\Http\Controllers\GeneralController;

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

    Route::post('/dashboard/conference/assignSpeaker', [ConferenceController::class, 'assignSpeaker'])
        ->name('speaker.conference.assign');

    Route::get('/dashboard/conference/assignSpeaker/{conference}', [ConferenceController::class, 'showAssign'])
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

    Route::post('/dashboard/event/agenda/add', [EventController::class, 'addAgenda'])
        ->name('agenda.event.add');

    Route::put('/dashboard/event/agenda/update/{agenda}', [EventController::class, 'updateAgenda'])
        ->name('agenda.event.update');

    Route::delete('/dashboard/event/agenda/delete/{agenda}', [EventController::class, 'deleteAgenda'])
        ->name('agenda.event.delete');

    Route::post('/dashboard/event/agenda/content/add', [EventController::class, 'addAgendaContent'])
        ->name('agenda.content.event.add');

    Route::get('/dashboard/event/agenda/form/{event}', [EventController::class, 'showAgendaForm'])
        ->name('agenda.event.form');

    Route::get('/dashboard/event/agenda/edit/form/{event}/{agenda}', [EventController::class, 'showEditAgendaForm'])
        ->name('agenda.event.form.edit');

    Route::get('/dashboard/event/agenda/content/edit/{agenda}/{content}', [EventController::class, 'editContent'])
        ->name('agenda.content.event.edit');

    Route::put('/dashboard/event/agenda/content/update/{content}', [EventController::class, 'updateContent'])
        ->name('agenda.content.event.update');

    Route::delete('/dashboard/event/agenda/content/delete/{content}', [EventController::class, 'deleteContent'])
        ->name('agenda.content.event.delete');

    Route::get('/dashboard/event/agenda/content/form/{agenda}', [EventController::class, 'showAgendaContentForm'])
        ->name('agenda.content.event.form');

    Route::get('/dashboard/event/agenda/{event}', [EventController::class, 'showAgenda'])
        ->name('agenda.event.show');

    Route::post('/dashboard/conference/agenda/add', [ConferenceController::class, 'addAgenda'])
        ->name('agenda.conference.add');

    Route::put('/dashboard/conference/agenda/update/{agenda}', [ConferenceController::class, 'updateAgenda'])
        ->name('agenda.conference.update');

    Route::delete('/dashboard/conference/agenda/delete/{agenda}', [ConferenceController::class, 'deleteAgenda'])
        ->name('agenda.conference.delete');

    Route::post('/dashboard/conference/agenda/content/add', [ConferenceController::class, 'addAgendaContent'])
        ->name('agenda.content.conference.add');

    Route::get('/dashboard/conference/agenda/{conference}', [ConferenceController::class, 'showAgenda'])
        ->name('agenda.conference.show');

    Route::get('/dashboard/conference/agenda/edit/form/{conference}/{agenda}', [ConferenceController::class, 'showEditAgendaForm'])
        ->name('agenda.conference.form.edit');

    Route::get('/dashboard/conference/agenda/content/edit/{agenda}/{content}', [ConferenceController::class, 'editContent'])
        ->name('agenda.content.conference.edit');

    Route::put('/dashboard/conference/agenda/content/update/{content}', [ConferenceController::class, 'updateContent'])
        ->name('agenda.content.conference.update');

    Route::delete('/dashboard/conference/agenda/content/delete/{content}', [ConferenceController::class, 'deleteContent'])
        ->name('agenda.content.conference.delete');

    Route::get('/dashboard/conference/agenda/content/form/{agenda}', [ConferenceController::class, 'showAgendaContentForm'])
        ->name('agenda.content.conference.form');

    Route::get('/dashboard/conference/agenda/form/{conference}', [ConferenceController::class, 'showAgendaForm'])
        ->name('agenda.conference.form');

    Route::get('/dashboard/settings/{general_info}', [GeneralController::class, 'index'])
        ->name('settings');

    Route::put('/dashboard/settings/update', [GeneralController::class, 'update'])
        ->name('update.settings');

    Route::get('/dashboard/settings/employee/create', [GeneralController::class, 'createEmployee'])
        ->name('create.employee.settings');

    Route::post('/dashboard/settings/employee/add', [GeneralController::class, 'addEmployee'])
        ->name('add.employee.settings');

    Route::put('/dashboard/settings/employee/update/{employee}', [GeneralController::class, 'updateEmployee'])
        ->name('update.employee.settings');

    Route::get('/dashboard/settings/employee/edit/{employee}', [GeneralController::class, 'editEmployee'])
        ->name('edit.employee.settings');

    Route::delete('/dashboard/settings/employee/delete/{employee}', [GeneralController::class, 'deleteEmployee'])
        ->name('delete.employee.settings');
});
