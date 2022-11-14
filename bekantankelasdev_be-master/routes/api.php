<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\MentorController;
use App\Http\Controllers\API\PenggunaController;
use App\Http\Controllers\API\JenisKelasController;
use App\Http\Controllers\API\LevelKelasController;
use App\Http\Controllers\API\KategoriKelasController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//
//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::post('/change-password', [App\Http\Controllers\API\AuthController::class, 'updatePassword'])->name('update-password');

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});

Route::resource('pengguna', PenggunaController::class);
Route::post('pengguna/{uuid}', [PenggunaController::class,'update']);
Route::get('/role',[PenggunaController::class,'role']);

Route::resource('role', RoleController::class);
Route::post('role/{uuid}', [RoleController::class,'update']);

Route::resource('kategori_kelas', KategoriKelasController::class);
Route::post('kategori_kelas/{uuid}', [KategoriKelasController::class,'update']);

Route::resource('level_kelas', LevelKelasController::class);
Route::post('level_kelas/{uuid}', [LevelKelasController::class,'update']);

Route::resource('jenis_kelas', JenisKelasController::class);
Route::post('jenis_kelas/{uuid}', [JenisKelasController::class,'update']);

Route::resource('mentor', MentorController::class);
Route::post('mentor/{uuid}', [MentorController::class,'update']);


