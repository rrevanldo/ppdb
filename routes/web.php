<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', [PpdbController::class, 'dashboard'])->name('dashboard');
// Route::get('/print', [PpdbController::class, 'print'])->name('print');

//halaman awal
Route::get('/', [PpdbController::class, 'index'])->name('index');

//login
Route::get('/login', [PpdbController::class, 'login'])->name('login');
Route::post('/login', [PpdbController::class, 'auth'])->name('login.auth');

// register
Route::get('/register', [PpdbController::class, 'register'])->name('register');
Route::post('/store', [PpdbController::class, 'store'])->name('store');

// print pdf
Route::get('/print/{id}', [PpdbController::class, 'print'])->name('print');

// logout
Route::get('/logout', [PpdbController::class, 'logout'])->name('logout');

//halaman setelah login admin
Route::middleware('isLogin', 'CekRole:admin')->group(function() {
    Route::get('/dashboard', [PpdbController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/users', [PpdbController::class, 'users'])->name('dashboard.users');
    Route::get('/dashboard/pembayaran', [PpdbController::class, 'pembayaran'])->name('dashboard.pembayaran');
    Route::get('/dashboard/complated', [PpdbController::class, 'complated'])->name('complated');
    Route::patch('/dashboard/complated/{id}', [PpdbController::class, 'updateComplated'])->name('update-complated');
});

//halaman setelah login user
Route::middleware('isLogin', 'CekRole:user')->prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::get('/dashboard', [PpdbController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/pembayaran', [PpdbController::class, 'pembayaran'])->name('dashboard.pembayaran');
    Route::patch('/dashboard/pembayaran/change', [PpdbController::class, 'uploadPembayaran'])->name('dashboard.pembayaran.change');
});

// halaman setelah login user dan admin
Route::middleware(['isLogin', 'CekRole:admin,user'])->group(function() {
    Route::get('/dashboard', [PpdbController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/profile', [PpdbController::class, 'profile'])->name('dashboard.profile');
    Route::get('/error', [PpdbController::class, 'error'])->name('error');
    Route::get('/dashboard/profile/upload', [PpdbController::class, 'profileUpload'])->name('dashboard.profile.upload');
    Route::patch('/dashboard/profile/change', [PpdbController::class, 'changeProfile'])->name('dashboard.profile.change');
    Route::get('/dashboard/pembayaran', [PpdbController::class, 'pembayaran'])->name('dashboard.pembayaran');
});
