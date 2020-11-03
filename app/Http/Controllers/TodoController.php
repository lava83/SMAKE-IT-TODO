<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ITodo;

class TodoController extends Controller
{



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ITodo $todo)
    {
        return view('home');
    }
}
