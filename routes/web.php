<?php

use Illuminate\Support\Facades\Route;

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

Route::get('sobre', function () {
    return "<h1>Página sobre</h1>";
})->name('hello');

Route::get('contato', function () {
    return "<h1>Página Contato</h1>";
});

Route::get('contato/{id}', function ($id) {
    return $id;
})->name('edit-contact');

Route::get('home', function () {
    return "<a href='".route('edit-contact', 1)."'>Sobre</a>";
});

/** Route Grouping */
Route::group(['prefix' => 'customer'], function(){
    Route::get('/', function () {
        return "<h1>Lista Customizada</h1>";
    });
    
    Route::get('/create', function () {
        return "<h1>Lista Customizada Create</h1>";
    });
    
    Route::get('show', function () {
        return "<h1>Lista Customizada Show</h1>";
    });
});

// Route Methods
/**
 * GET - Request a resource
 * POST - Create a new resource
 * PUT - Update a resource
 * PATCH - Modify a resource
 * DELETE - Delete a resource
 */

/** Fallback Route */
Route::fallback(function(){
    return "<h1>Rota não existe!</h1>";
});
