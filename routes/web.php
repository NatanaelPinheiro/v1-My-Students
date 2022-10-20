<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SchoolClassesController;
use App\Http\Controllers\SchoolDataController;
use App\Http\Controllers\UserController;
use App\Models\SchoolClass;
use App\Models\SchoolData;

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


Route::controller(UserController::class)
    ->group(
        function () {
            Route::get('/login', 'index')->name('login');
            Route::post('/login', 'authenticate')->name('login.auth');
            Route::post('/logout', 'logout')->name('logout');
        }
    );

Route::get('/', [Controller::class, 'index'])->middleware('auth')->name('home');

Route::get('fetch-students', [StudentsController::class, 'fetchStudents'])->middleware('auth');
Route::get('fetch-classes', [SchoolClassesController::class, 'fetchClasses'])->middleware('auth');
Route::get('fetch-schooldata', [SchoolDataController::class, 'fetchSchoolData'])->middleware('auth');

Route::controller(StudentsController::class)
    ->middleware('auth')
    ->prefix('/students')
    ->as('students.')
    ->group(
        function () {
            Route::get('/', 'index')->name('index');
            // Route::get('/show/{id}', 'show')->name('show');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete', 'destroy')->name('delete');
        }
    );

Route::controller(SchoolClassesController::class)
    ->middleware('auth')
    ->prefix('/classes')
    ->as('classes.')
    ->group(
        function () {
            Route::get('/', 'index')->name('index');
            // Route::get('/show/{id}', 'show')->name('show');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete', 'destroy')->name('delete');
        }
    );

Route::controller(SchoolDataController::class)
    ->middleware('auth')
    ->prefix('/schooldata')
    ->as('schooldata.')
    ->group(
        function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
        }
    );