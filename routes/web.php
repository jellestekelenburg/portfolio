<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

// Route::get('/{any}', function () {
//    return Inertia::render('ComingSoon');
// });

// require __DIR__.'/settings.php';
