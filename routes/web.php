<?php

use App\Livewire\CoursesPage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/courses', CoursesPage::class)->name('courses');
