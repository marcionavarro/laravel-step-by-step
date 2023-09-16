<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function handleImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|min:200|max:500|mimes:png,jpg,gig' // 50kb
        ]);
        $request->image->storeAs('/images', 'new_image.jpg');
        // $request->image->store('/images');
    }
}
