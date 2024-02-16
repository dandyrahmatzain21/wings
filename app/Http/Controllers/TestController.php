<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    //Method Index
    public function index()
    {
        return view('test/test');
    }
}
