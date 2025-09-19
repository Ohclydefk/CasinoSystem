<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return redirect()->route('members.index');
});

Route::controller(MemberController::class)->group(function () {
    Route::get('/members', 'index')->name('members.index');
    Route::get('/members/create', 'create')->name('members.create');
    Route::post('/members', 'store')->name('members.store');
    Route::get('/members/{id}/edit', 'edit')->name('members.edit');
    Route::put('/members/{id}', 'update')->name('members.update');
    Route::delete('/members/{id}', 'destroy')->name('members.destroy');
});
