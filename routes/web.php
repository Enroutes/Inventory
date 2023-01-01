<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {

    Route::livewire('/dashboard', 'dashboard');
    Route::livewire('/payments', 'payments');
    Route::livewire('/stockmanager', 'stock-manager');
    Route::livewire('/addcategory', 'categories');
    Route::livewire('/addsales', 'add-sales');
    Route::livewire('/addmembers', 'add-members');
    Route::livewire('/stockavailable', 'stock-avaliable');
    Route::livewire('/viewsales', 'view-sales');
    Route::livewire('/viewlaybuy', 'view-laybuy');
    Route::livewire('/addlaybuy', 'add-laybuy');
    Route::livewire('/addlaybuypayment', 'add-laybuy-payment');
    Route::livewire('/subcategoryselect', 'subcategory-select');
    Route::livewire('/allmembers', 'all-members');
    Route::livewire('/earnings', 'earnings');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
