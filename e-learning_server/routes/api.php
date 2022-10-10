<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstructorCantroller;
use Illuminate\Support\Facades\Route;

Route::post("/login", [AuthController::class, "login"])->name("login");

Route::get("/add_user_type/{user_type}", [AdminController::class, "addUserType"]);
Route::post("/add_user", [AdminController::class, "addUser"])->name("add-user");
Route::post("/login", [AuthController::class, "login"])->name("login");
Route::post("/add_course", [AdminController::class, "addCourse"])->name("add-course");
Route::get("/assign/{code_code?}/{user_id?}", [AdminController::class, "assign"])->name("assign");
Route::post("/add_assignment", [InstructorCantroller::class, "addAssignment"])->name("add-assignment");