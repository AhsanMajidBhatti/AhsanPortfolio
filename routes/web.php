<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\ResumeController::class, 'index']);

Route::group(['middleware' => 'Admin'], function(){
    Route::get('/dashboard', [App\Http\Controllers\ResumeController::class, 'Dashboard'])->name('admin.dashboard');

    Route::resource('/sidebar', App\Http\Controllers\SidebarController::class);
    Route::resource('/education', App\Http\Controllers\EducationController::class);
    Route::resource('/experience', App\Http\Controllers\ExperienceController::class);
    Route::resource('/project', App\Http\Controllers\ProjectsController::class);
    Route::resource('/award', App\Http\Controllers\AwardController::class);
    Route::resource('/about', App\Http\Controllers\AboutController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
