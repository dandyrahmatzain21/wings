<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriModel extends Model
{
    use HasFactory;

    //Ambil Semua Data
    public function allData()
    {
        return DB::table('tbl_kategori')->get();
    }
    //

    //Ambil Detail Data Berdasarkan Id Kategori
    public function detailData($id_kategori)
    {
        return DB::table('tbl_kategori')->where('id_kategori', $id_kategori)->first();
    }
    //

    //Input Data Ke DB
    public function addData($data)
    {
        DB::table('tbl_kategori')->insert($data);
    }
    //

    //Update Data Ke DB
    public function editData($id_kategori,$data)
    {
        DB::table('tbl_kategori')->where('id_kategori',$id_kategori)->update($data);
    }
    //

    //Delete Data Dari DB
    public function deleteData($id_kategori)
    {
        DB::table('tbl_kategori')->where('id_kategori',$id_kategori)->delete();
    }
    //
}
