<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\TafController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\MilitaryController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SituationController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\NothingShouldController;
use App\Http\Controllers\TransgressionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* resources */
    Route::resource('position', PositionController::class);
    Route::resource('section', SectionController::class);
    Route::resource('situation', SituationController::class);
    Route::resource('military', MilitaryController::class);
    Route::resource('map', MapController::class);
    Route::resource('transgression', TransgressionController::class);
    Route::resource('comment', CommentController::class);

    /* declaration */
    Route::get('/declaration', [DeclarationController::class, 'create']);
    Route::post('/declaration', [DeclarationController::class, 'generateFile']);

    /* taf  */
    Route::get('/taf', [TafController::class, 'create']);
    Route::post('/taf', [TafController::class, 'calculate']);

    /* nothing should */
    Route::get('/nothing-should', [NothingShouldController::class, 'create']);
    Route::get('/nothing-should', [NothingShouldController::class, 'generateFile']);
});

require __DIR__ . '/auth.php';
