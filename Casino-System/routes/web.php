<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return redirect()->route('members.dashboard');
});

Route::controller(MemberController::class)->group(function () {
    Route::get('/members', 'index')->name('members.index');
    Route::get('/dashboard', 'dashboard')->name('members.dashboard');
    Route::get('/archived members', 'archives')->name('members.archives');
    Route::get('/members/manage', 'manage')->name('members.manage');
    Route::get('/members/create', 'create')->name('members.create');
    Route::post('/members', 'store')->name('members.store');
    Route::get('/members/{id}/edit', 'edit')->name('members.edit');
    Route::put('/members/{id}', 'update')->name('members.update');
    Route::delete('/members/{id}', 'destroy')->name('members.destroy');
    Route::patch('/members/{id}/archive', 'archiveMember')->name('members.archive-member');
    Route::patch('/members/{id}/unarchive', 'unarchive')->name('members.unarchive');
});
