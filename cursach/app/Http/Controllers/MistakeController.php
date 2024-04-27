<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MistakeController extends Controller
{
    public function index()
    {
        return view('mistake');
    }
}
