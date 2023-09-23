<?php

use App\DataTables\UsersDataTable;
use App\Helpers\ImageFilter;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

Route::get('user/{id}/edit', function($id){
    return "<h1>Editar #$id</h1>";
})->name('user.edit');

Route::get('user/{id}/delete', function($id){
    return "<h1>Deletar #$id</h1>";
})->name('user.delete');

Route::get('/dashboard', function (UsersDataTable $dataTable) {
    return $dataTable->render('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('image', function(){
    $img = ImageManagerStatic::make('image.jpg');
    $img->filter(new ImageFilter(5));
    
    // $img->crop(400, 400);
    // $img->save('imagecrop2.jpg', 80);
    return $img->response();
});

Route::get('shop', [CartController::class, 'shop'])->name('shop');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{product_id}',[CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('qty-increment/{rowId}', [CartController::class, 'qtyIncrement'])->name('qty-increment');
Route::get('qty-decrement/{rowId}', [CartController::class, 'qtyDecrement'])->name('qty-decrement');
Route::get('remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('remove-product');

Route::get('create-role', function(){
    /* $role = Role::create(['name' => 'publisher']);
    return $role; */

   /*  $permission = Permission::create(['name' => 'edit articles']);
    return $permission; */
    
    $user = auth()->user();
    // $user->assignRole('writer');
    // $user->givePermissionTo('edit articles');

    if($user->can('edit articles')){
        return  'Usuário autorizado';
    }else{
        return 'Usuário não autorizado';
    }
});

Route::get('posts', function(){
    $posts = Post::all();
    return view('post.post', compact('posts'));
});