<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function instructor()
    {
        return view('instructors.index');
    }
    public function student()
    {
        return view('students.home');
    }
}
