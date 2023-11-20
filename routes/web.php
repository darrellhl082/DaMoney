<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\User;
use App\Models\Flows;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FlowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FlowsController;
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

Route::get('/', function () {
    return view('home',[
        "title" => "Beranda",
        "books" => Book::where("user_id", auth()->user()->id)->get()
    ]);
})->middleware('auth');

Route::get('/login',[LoginController::class,'index'])->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate'])->name('login')->middleware('guest');
Route::post('/logout',[LoginController::class,'logout'])->name('logout')->middleware("auth");
Route::get('/register',[UserController::class,'create'])->middleware('guest');
Route::post('/register',[UserController::class,'store']);


Route::get('/books/create',[BookController::class,  'create'])->middleware('auth');
Route::get('/buku/{book:key}', [BookController::class,"show"])->middleware('auth');
Route::post('/books',[BookController::class,'store'])->middleware("auth");
Route::get('/buku/{book:key}/pengeluaran/tambah', [FlowController::class,'create_outcome']);
Route::post('/buku/{book:key}/pengeluaran/tambah', [FlowController::class,'store']);
Route::get('/buku/{book:key}/pemasukan/tambah', [FlowController::class,'create_income']);
Route::post('/buku/{book:key}/pemasukan/tambah', [FlowController::class,'store']);
Route::get('/buku/{book:key}/pengeluaran', [BookController::class,"show_outcome"])->name('outcome')->middleware('auth');
Route::get('/buku/{book:key}/pemasukan', [BookController::class,"show_income"])->name('income')->middleware('auth');
Route::post('/buku/{book:key}/pengeluaran/urutan', [BookController::class,'urutan'])->middleware("auth");
Route::post('/buku/{book:key}/pemasukan/urutan', [BookController::class,'urutan'])->middleware("auth");
Route::get('/buku/{book:key}/analisis', [BookController::class, 'analisis'])->middleware('auth');
Route::post('/buku/{book:key}/analisis', [BookController::class, 'analisis'])->middleware('auth');
Route::post('/laporan/{book:key}/periode', [BookController::class, 'period'])->middleware('auth');

Route::put('/flow/{flow}',[FlowController::class,'update'])->middleware("auth");
Route::delete('/flow/{flow}',[FlowController::class,'destroy'])->middleware("auth");