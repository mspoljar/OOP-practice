<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PictureController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=>'web'],function(){
    Route::get('/pictures/{id}', [PictureController::class, 'pictures'])->name('pictures');
    Route::get('/picture/upload', [PictureController::class, 'upload'])->name('picupload');
    Route::post('/picture/save', [PictureController::class, 'save'])->name('picsave');
    Route::get('/picture/delete/{id}', [PictureController::class, 'delete']);
    Route::get('/picture/change/{id}', [PictureController::class, 'change']);
});
