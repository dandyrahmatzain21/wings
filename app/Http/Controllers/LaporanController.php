<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Method Index
    public function index()
    {
        return view('laporan/v_laporan');
    }
    //
}
