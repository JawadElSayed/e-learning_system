<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get("/add_user_type/{user_type}", [AdminController::class, "addUserType"]);
Route::post("/add_user", [AdminController::class, "addUser"])->name("add-user");
Route::post("/login", [AuthController::class, "login"])->name("login");
