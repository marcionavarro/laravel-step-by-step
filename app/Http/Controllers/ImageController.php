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
        return redirect('success');
        // return redirect()->back();
        // return redirect()->route('success');
        // $request->image->store('/images');
    }

    public function download()
    {
        return response()->download(public_path('storage/images/new_image.jpg'));
    }
}
