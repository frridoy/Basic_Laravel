<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }
}
