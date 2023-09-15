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

Route::get('/home', function(){
    $blogs = [
        [
            'title' => 'Título um',
            'body' => 'Este é um corpo de texto',
            'status' => 1
        ],
        [
            'title' => 'Título dois',
            'body' => 'Este é um corpo de texto',
            'status' => 0
        ],
        [
            'title' => 'Título três',
            'body' => 'Este é um corpo de texto',
            'status' => 1
        ],
        [
            'title' => 'Título quatro',
            'body' => 'Este é um corpo de texto',
            'status' => 1
        ],
    ];
    return view('home', compact('blogs'));
});

Route::get('/sobre', function () {
    return view('about');
})->name('about');

Route::get('contato', function () {
    return view('contact');
});

/**
 * MVC
 * -----
 * M = Model
 * V = Views
 * C = Controller
 */
