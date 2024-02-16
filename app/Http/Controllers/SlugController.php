<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlugController extends Controller
{
    //
    public function index($slug)
    {
        $slug = DB::table('tbl_produk')
        ->join('tbl_kategori','tbl_produk.id_kategori','=','tbl_kategori.id_kategori')
        ->join('users','tbl_produk.id_penjual','=','users.id')
        ->where('tbl_produk.status','=',2)
        ->where('tbl_kategori.slug','=',$slug)->get();

        return view('slug/v_slug',compact('slug','slug'));
    }
}
