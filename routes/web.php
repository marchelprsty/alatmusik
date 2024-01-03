<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatMusikController;
use Illuminate\Support\Facades\Auth;



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
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'checkRole:pembeli']], function () {
    // Routes untuk pembeli
});

Route::group(['middleware' => ['auth', 'checkRole:penjual']], function () {
    // Routes untuk penjual
});
Route::group(['middleware' => ['checkLogout']], function () {
    // Routes yang hanya dapat diakses oleh pengguna yang belum login
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Rute untuk tampilan login dan register
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/alatmusik', [AlatMusikController::class, 'index'])->name('index');
Route::get('/alatmusik/{id}', [AlatMusikController::class, 'show'])->name('show');

// Route::middleware(['auth'])->group(function () {
    Route::get('/create', [AlatMusikController::class, 'create'])->name('create');
    Route::post('/store', [AlatMusikController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AlatMusikController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [AlatMusikController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [AlatMusikController::class, 'destroy'])->name('destroy');
// });

Route::get('/get-user-name', [UserController::class, 'getName']);

// web.php atau api.php

Route::post('/login', 'Auth\LoginController@login')->name('login');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
