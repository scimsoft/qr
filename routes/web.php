<?php

use App\Http\Controllers\QRCodeGenerator;
use App\Http\Controllers\QRRedirectController;
use App\Http\Controllers\RedirectController;
use App\Http\Middleware\Authenticate;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();
Route::post('saveTable' ,[QRRedirectController::class,'saveTable'])->middleware('is_manager')->name('saveTable');
Route::resource('qrredirect', QRRedirectController::class)->middleware('is_manager');


Route::get('qrcode',[QRCodeGenerator::class,'index'])->middleware('is_manager');
Route::get('changetable/$id',[QRRedirectController::class,'changetable'])->middleware('is_manager');



Route::post('generate',[QRCodeGenerator::class,'generate'])->middleware('is_manager');
Route::get('/{id}', [RedirectController::class, 'redirect'] );



