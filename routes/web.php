<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use \App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

//all listing
Route::get('/', [ListingController::class, 'index']);


//show Create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');


//managae Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
//single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//store lising data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// update isting
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->middleware('auth');

//sho Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
//create new user
Route::post('/users', [UserController::class, 'store']);
//log user out
Route::post('/logout', [UserController::class, 'logout']);
// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//no need to create all and find when create eloquent model they already exist in model.php



