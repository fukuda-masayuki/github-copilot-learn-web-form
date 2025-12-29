<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('applications.index');
});

Route::resource('applications', ApplicationController::class);
