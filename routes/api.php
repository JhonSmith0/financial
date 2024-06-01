<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(app_path() . '/Domain/Auth/Routes/AuthRoute.php');
Route::prefix('/person')->group(app_path() . '/Domain/Person/Routes/PersonRoute.php');
