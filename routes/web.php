<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('ComingSoon');
})->name('home');

//require __DIR__.'/settings.php';
