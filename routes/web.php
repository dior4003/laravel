<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostCOntroller;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// public routes start

Route::get('/',[PageController::class, 'index'])->name("home");
Route::get('/about',[PageController::class, 'about'])->name("about");
Route::get('/contact',[PageController::class, 'contact'])->name("contact");
Route::get('/services',[PageController::class, 'services'])->name("services");
Route::get('/portifolio',[PageController::class, 'portifolio'])->name("portifolio");

// public routes end

// auth routes start
Route::get('/login',[PageController::class, 'login'])->name("login");



// auth routes end




Route::resource("post" ,PostCOntroller::class );