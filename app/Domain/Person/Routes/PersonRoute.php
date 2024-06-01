<?php

namespace App\Domain\Person\Routes;

use App\Domain\Person\Contracts\PersonServiceContract;
use App\Domain\Person\Controllers\PersonController;
use App\Domain\Person\DTO\CreatePersonDTO;
use App\Domain\Person\DTO\NewPersonDTO;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->middleware(['auth.jwt'])->group(function () {
    Route::post('/', [PersonController::class, 'store']);
    Route::get('/', [PersonController::class, 'index']);

    Route::get('/{personId}', [PersonController::class, 'show'])->where('personId', '\d+');
    Route::delete('/{personId}', [PersonController::class, 'delete'])->where('personId', '\d+');
    Route::put('/{personId}', [PersonController::class, 'update'])->where('personId', '\d+');
});
