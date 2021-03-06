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

Route::get('/', function () {
    return redirect('login');
});


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['admin','hrd','manager'])->group(function () {
    Route::resource('tasks', App\Http\Controllers\TaskController::class);
    Route::resource('projects', App\Http\Controllers\ProjectController::class);
    Route::resource('userProjects', App\Http\Controllers\UserProjectController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('presence', App\Http\Controllers\PresenceController::class);
    Route::post('/absenDestroyed', [App\Http\Controllers\HomeController::class, 'absenDestroy'])->name('absen.destroy');
});

Route::middleware('hrd')->group(function () {
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('presence', App\Http\Controllers\PresenceController::class);
    Route::post('/absenDestroyed', [App\Http\Controllers\HomeController::class, 'absenDestroy'])->name('absen.destroy');
});

Route::middleware('manager')->group(function () {
    Route::resource('tasks', App\Http\Controllers\TaskController::class);
    Route::resource('projects', App\Http\Controllers\ProjectController::class);
    Route::resource('userProjects', App\Http\Controllers\UserProjectController::class);
});

Route::middleware('karyawan')->group(function () {
    Route::get('/project', [App\Http\Controllers\HomeController::class, 'project'])->name('karyawan.project');
    Route::get('/project/{id}', [App\Http\Controllers\HomeController::class, 'projectDetail'])->name('karyawan.projectDetail');
    Route::get('/task-project', [App\Http\Controllers\HomeController::class, 'projectTask'])->name('karyawan.projectTask');
    Route::post('/updateStatus', [App\Http\Controllers\HomeController::class, 'updateStatus'])->name('updateStatus');
    Route::post('/postAbsen', [App\Http\Controllers\HomeController::class, 'postAbsen'])->name('absen.post');
    Route::post('/absenEnd', [App\Http\Controllers\HomeController::class, 'absenEnd'])->name('absen.end');
});

