<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get("/add_user_type/{user_type}", [AdminController::class, "addUserType"]);
