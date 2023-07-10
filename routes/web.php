<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;


Route::middleware(["auth"])->group(function(){

	Route::get("/" , [HomeController::class , "index"])->name("home");

	Route::get("/tasks/create" , [TaskController::class , "create"])->name("task.create");
	Route::post("/tasks/create" , [TaskController::class , "store"]);

	Route::get("/tasks/edit/{id}" , [TaskController::class , "edit"])->name("task.edit");
	Route::post("/task/edit/{id}" , [TaskController::class , "update"]);
	
	Route::post("/task/update" , [TaskController::class , "updateStatus"])->name("task.update");

	Route::get("/categories/create" , [CategoryController::class , "create"])->name("categories.create");
	Route::post("/categories/create" , [CategoryController::class , "store"]);

	Route::get("/task/{id}" , [TaskController::class , "show"])->name("task.show");
	Route::get("/tasks/delete/{id}" , [TaskController::class , "delete"]);
	Route::get("/logout" , [UserController::class , "logout"]);

});



Route::get("/login" , [UserController::class , "login"])->name("login");
Route::get("/register" , [UserController::class , "create"])->name("register");
Route::post("/login" , [UserController::class , "verify"]);
Route::post("/register" , [UserController::class , "store"]);