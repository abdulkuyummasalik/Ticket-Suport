<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketTypeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TicketController;

Route::get('/', function(){
    return view('home');
});

Route::prefix('/ticket_types')->name('ticket_types.')->group(function () {
    Route::get('/', [TicketTypeController::class, 'index'])->name('index');
    Route::get('/create', [TicketTypeController::class, 'create'])->name('create');
    Route::post('/store', [TicketTypeController::class, 'store'])->name('store');
    Route::get('/show/{id}', [TicketTypeController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [TicketTypeController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [TicketTypeController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [TicketTypeController::class, 'destroy'])->name('destroy');
});
Route::prefix('/projects')->name('projects.')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::post('/store', [ProjectController::class, 'store'])->name('store');
    Route::get('/show/{id}', [ProjectController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [ProjectController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [ProjectController::class, 'destroy'])->name('destroy');
});
Route::prefix('/tickets')->name('tickets.')->group(function () {
    Route::get('/', [TicketController::class, 'index'])->name('index');
    Route::get('/create', [TicketController::class, 'create'])->name('create');
    Route::post('/store', [TicketController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TicketController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [TicketController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [TicketController::class, 'destroy'])->name('destroy');
});
