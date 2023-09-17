<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Mail\OrderShipped;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Route::group(['middleware' => 'authCheck2'], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/profile', function () {
        return view('profile');
    });

});

Route::get('/posts/trash', [PostController::class, 'trashed'])->name('posts.trashed');
Route::get('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/posts/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.force_delete');

Route::resource('posts', PostController::class);
// Route::resource('posts', PostController::class)->middleware('authCheck2');

Route::get('/unavailable', function () {
    return view('unavailable');
})->name('unavailable');

Route::get('contato', function () {
    $posts = Post::all();
    return view('contact', compact('posts'));
});

Route::get('send-email', function () {
    Mail::send(new OrderShipped);

    /* Mail::raw('this is a test mail', function($message){
        $message->to('test@gmail.com')->subject('hi this is a test mail');
    }); */

    dd('success');
});

Route::get('get-session', function (Request $request) {
    // $data = $request->session()->get('_token');
    $data = $request->session()->all();
    // $data = session()->all();
    dd($data);
});

Route::get('save-session', function (Request $request) {
    session(['user_ip' => '123.23.11']);
    $request->session()->put(['user_status' => 'logged_in']);
    session(['user_id' => '123']);
    return redirect('get-session');
});

Route::get('destroy-session', function (Request $request) {
    $request->session()->flush();
    // session()->flush();
    // session()->forget(['user_status', 'user_ip']);
    // $request->session()->forget(['user_status', 'user_ip']);
    return redirect('get-session');
});

Route::get('flash-session', function(Request $request){
    $request->session()->flash('status', 'true');
    return redirect('get-session');
});

// Route::group([], callback)

/* Route::get('/home', HomeController::class);
Route::post('/upload-file', [ImageController::class, 'handleImage'])->name('upload-file');

Route::get('/success', function () {
    return '<h1>Upload realizado com sucesso!</h1>';
})->name('success');

Route::get('/download', [ImageController::class, 'download'])->name('download');

Route::get('/sobre', [AboutController::class, 'index'])->name('about');
Route::get('/contato', [ContactController::class, 'index'])->name('contact');
Route::resource('blog', BlogController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'handleLogin'])->name('login.submit'); */