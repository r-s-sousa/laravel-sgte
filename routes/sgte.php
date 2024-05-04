<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TafController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\MilitaryController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SituationController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\NothingShouldController;
use App\Http\Controllers\TransgressionController;

Route::middleware('auth')->group(function () {
    Route::resource('position', PositionController::class);
    Route::get('positions/search', [PositionController::class, 'search'])
        ->name('position.search');

    Route::resource('section', SectionController::class);
    Route::resource('military', MilitaryController::class);
    Route::resource('situation', SituationController::class);
    Route::resource('transgression', TransgressionController::class);
    Route::resource('comment', CommentController::class);
    Route::resource('user', UserController::class);

    Route::get('/declaration', [DeclarationController::class, 'create'])
        ->name('declaration.create');
    Route::post('/declaration', [DeclarationController::class, 'generateFile'])
        ->name('declaration.generateFile');

    Route::get('/taf', [TafController::class, 'create'])
        ->name('taf.create');
    Route::post('/taf', [TafController::class, 'calculate'])
        ->name('taf.calculate');

    Route::get('/nothing-should', [NothingShouldController::class, 'create'])
        ->name('nothing-should.create');
    Route::post('/nothing-should', [NothingShouldController::class, 'generateFile'])
        ->name('nothing-should.generateFile');

    Route::get('/badge', [BadgeController::class, 'create'])
        ->name('badge.create');
    Route::post('/badge', [BadgeController::class, 'generateFile'])
        ->name('badge.generateFile');
});
