<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $programs = Program::get();
        return view('home.index', ['programs' => $programs]);
    }
}
