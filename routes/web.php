<?php

use App\Http\Controllers\LocalizationController;
use App\Models\ShiftDetails;
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

Route::get('test', function () {
    $shift_details= ShiftDetails::approved()->inVacation('2024-05-29','2024-05-30');
    dd($shift_details->get());
    
});