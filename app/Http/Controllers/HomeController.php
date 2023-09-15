<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
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
    }
}
