<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ShopController;
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

Route::get('tests/test',[TestController::class,'index']);

Route::get('shops',[ShopController::class,'index']);
//Route::resource('contacts',ContactFormController::class);



Route::prefix('contacts')->middleware(['auth'])
->controller(ContactFormController::class)
->name('contacts.')
->group(function(){
    Route::get('/','index')->name('index');  
    Route::get('/create','create')->name('create');  
    Route::post('/','store')->name('store');
    Route::get('/{id}','show')->name('show'); 
    Route::get('/{id}/edit','edit')->name('edit'); 
    Route::post('/{id}','update')->name('update');
    Route::post('/{id}/destroy', 'destroy')->name('destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
