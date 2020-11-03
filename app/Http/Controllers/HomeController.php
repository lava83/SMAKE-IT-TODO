<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ITodo;
use Illuminate\Http\Request;

class HomeController extends Controller
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
