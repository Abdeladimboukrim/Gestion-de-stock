<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

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



Route::get('/',[ProduitController::class,'index']);


Route::get('/create', function () {
    return view('create');   
});

Route::post('/produit',[ProduitController::class,'store']);
Route::delete('/delete/{id}',[ProduitController::class,'destroy']);
Route::get('/edit/{id}',[ProduitController::class,'edit']);
Route::delete('/deleteimage/{id}',[ProduitController::class,'deleteimage']);
Route::delete('/deletecover/{id}',[ProduitController::class,'deletecover']);
Route::put('/update/{id}',[ProduitController::class,'update']);