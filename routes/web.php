<?php

use App\Http\Controllers\LocalizationController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    'language/{locale}',
    [LocalizationController::class, 'setLanguage']
)->name('language');
