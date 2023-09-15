<?php

namespace App\Http\Controllers;

use App\Models\MyPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Post::withTrashed()->find(5)->forceDelete();
        //  Post::withTrashed()->find(3)->restore();
        // return Post::onlyTrashed()->get();

       /*  Post::where('id', 5)->delete();
        dd('success'); */

        /* $post = Post::where('status', 1)->update([
                    'status' => 0
                ]); */

        /* $post = Post::find(5)->update([
           'title' => 'Atutalizando o post'
       ]); */

        /* $post = Post::create([
            'title' => 'Nova inseração assign',
            'description' => 'Novo Post descrição',
            'status' => 1,
            'publish_date' => date('Y-m-d'),
            'user_id' => 1,
            'category_id' => 2,
            'views' => 500
        ]);        
        dd('success');
        */

        /* $post = Post::where('id', 4)->delete();
        dd('success'); */

        /* $post = Post::find('id', 4)->first(); //collection
        $post->title = 'Novo Post 8';
        $post->description = 'Novo Post descrição';
        $post->save();
        dd('success'); */

        /* $post = new Post();
        $post->title = 'Post 4';
        $post->description = 'Post descrição';
        $post->status = 1;
        $post->publish_date = date('Y-m-d');
        $post->user_id = 1;
        $post->category_id = 1;
        $post->views = 400;
        $post->save();
        dd('success'); */

        // return Post::where('views', '>' , 100)->orWhere('id', '=', '2')->get();
        // return Post::where('views', '>' , 100)->where('id', '=', '2')->get();

        /* $posts = Post::all();
        foreach($posts as $post){
            echo $post->title;
        } */

        /**
         * 1.Retriveing all data
         * 2.Retriving single data
         * 3.Retring a single data or throw error
         */
        // return Post::all(); // DB::table('posts')->get()

        // return $post = Post::findOrFail(6);
        // return $posts = MyPost::all();
    }
}