<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('ComingSoon');
})->name('home');

Route::get('/{any}', function () {
    return Inertia::render('ComingSoon');
});

//require __DIR__.'/settings.php';
