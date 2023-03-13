<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\test1Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/** metode tanpa controller langsung mengarah ke view **/
Route::get("/test", function () {
    return view("test");
});

/** metode tanpa view **/
Route::get("/test1", function () {
    return "dsdsds";
});

/** metode dengan menggunakan controller **/
Route::get("/test2", [test1Controller::class, "index"]);

Route::get("/login", function () {
    return view("login");
});

Route::get("/siswa", [siswaController::class, "index"])->name('siswa');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post("/siswa/create/success", [siswaController::class, "store"]) ->name("siswa.store");
