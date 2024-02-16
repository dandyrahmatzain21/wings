<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenjualModel extends Model
{
    use HasFactory;

    //Ambil Data Dari DB
    public function allData()
    {
        return DB::table('tbl_penjual')->get();
    }
    //

    //Ambil Data Dari DB Berdasarkan ID
    public function detailData($id_penjual)
    {
        return DB::table('tbl_penjual')->where('id_penjual', $id_penjual)->first();
    }
    //

    //Insert Data Ke DB
    public function addData($data)
    {
        DB::table('tbl_penjual')->insert($data);
    }
    //

    //Update Data Ke DB
    public function editData($id_penjual,$data)
    {
        DB::table('tbl_penjual')->where('id_penjual',$id_penjual)->update($data);
    }
    //

    //Delete Data Ke DB
    public function deleteData($id_penjual)
    {
        DB::table('tbl_penjual')->where('id_penjual',$id_penjual)->delete();
    }
    //
}
