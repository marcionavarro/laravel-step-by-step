<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home');

        // Storage::delete('/images/new_image.jpg');
        // File::delete(storage_path('/app/public/images/pOQm9jAM0O1YrPKN6zYlV6b3ITxrFrdsORpu5JaQ.jpg'));
        // unlink(storage_path('/app/public/images/Q08i0vEqXuyo2kVneIkYAX7FJ4E9pRjTs2LsH8u1.jpg'));
    }
}