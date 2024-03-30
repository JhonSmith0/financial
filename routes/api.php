<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(app_path() . '/Domain/Auth/Routes/AuthRoute.php');
