<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        /**
         * count()
         * max()
         * min()
         * avg()
         * sum()
         */
        return DB::table('posts')->avg('views');
    }
}