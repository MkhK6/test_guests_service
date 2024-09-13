<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::group(['prefix' => 'guests'], function () {
    Route::get('{id}', [GuestController::class, 'show']);
    Route::post('', [GuestController::class, 'create']);
    Route::put('{id}', [GuestController::class, 'update']);
    Route::delete('{id}', [GuestController::class, 'delete']);
});
