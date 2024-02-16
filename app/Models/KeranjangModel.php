<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KeranjangModel extends Model
{
    use HasFactory;
    //Ambil Semua Data
    public function allData($id_customer)
    {
        return DB::table('tbl_pesanan_detail')
        ->join('users','tbl_pesanan_detail.id_pesanan_detail','=','users.id')
        ->join('tbl_produk','tbl_pesanan_detail.id_produk','=','tbl_produk.id_produk')
        ->join('tbl_pesanan','tbl_pesanan_detail.id_pesanan','=','tbl_pesanan.id_pesanan')
        ->where('id','=',$id_customer)
        ->where('tbl_pesanan.status','=',0)->get();
    }

    public function allDataKeranjang($id_pesanan_detail){
        return DB::table('tbl_pesanan')
        ->join('tbl_pesanan_detail','tbl_pesanan.id_pesanan','=','tbl_pesanan_detail.id_pesanan')
        ->where('customer_id','=',$id_pesanan_detail)
        ->where('id_pesanan_detail','=',$id_pesanan_detail)
        ->where('status','=',0)->first();
    }

    public function total_keranjang($id_pesanan_detail){
        return DB::table('tbl_pesanan')
        ->join('tbl_pesanan_detail','tbl_pesanan.id_pesanan','=','tbl_pesanan_detail.id_pesanan')
        ->where('customer_id','=',$id_pesanan_detail)
        ->where('id_pesanan_detail','=',$id_pesanan_detail)
        ->where('status','=',0)->count('tbl_pesanan.id_pesanan');
    }
    //

    public function allDataKeranjang2($id_pesanan_detail){
        return DB::table('tbl_pesanan')
        ->join('tbl_pesanan_detail','tbl_pesanan.id_pesanan','=','tbl_pesanan_detail.id_pesanan')
        ->join('tbl_produk','tbl_pesanan_detail.id_produk','=','tbl_produk.id_produk')
        ->join('tbl_kategori','tbl_produk.id_kategori','=','tbl_kategori.id_kategori')
        ->where('customer_id','=',$id_pesanan_detail)
        ->where('id_pesanan_detail','=',$id_pesanan_detail)
        ->where('tbl_pesanan.status','=',0)->get();
    }
    //

    public function allDataKeranjangUpdate($id_pesanan_detail,$data){
        return DB::table('tbl_pesanan')
        ->where('customer_id',$id_pesanan_detail)
        ->where('status',0)
        ->update($data);
    }

    public function update_metode_pengiriman($id_pesanan,$metode_pengiriman){
        return DB::table('tbl_pesanan')
        ->where('id_pesanan',$id_pesanan)
        ->update($metode_pengiriman);
    }

    public function test($id_customer){
        return DB::table('tbl_pesanan')
        ->join('tbl_pesanan_detail','tbl_pesanan.id_pesanan','=','tbl_pesanan_detail.id_pesanan')
        ->where('customer_id','=',$id_customer)
        ->where('id_pesanan_detail','=',$id_customer)
        ->where('status','=',0)
        ->sum('tbl_pesanan.subtotal');
    }

    //Input Data Ke DB
    public function addData($data)
    {
        DB::table('tbl_pesanan_detail')->insert($data);
    }
    //
    //Input Data Ke DB
    public function addDataPesanan($data2)
    {
        DB::table('tbl_pesanan')->insert($data2);
    }
    //
    //Mengambil Data Dari DB
    public function ListDataProduk($id_produk)
    {
        return DB::table('tbl_produk')
        ->join('tbl_kategori','tbl_produk.id_kategori','=','tbl_kategori.id_kategori')
        ->where('id_produk',$id_produk)->first();
    }

    //Delete Data Dari DB
    public function deleteDataPesananDetail($id_pesanan)
    {
        DB::table('tbl_pesanan_detail')->where('id_pesanan',$id_pesanan)->delete();
        DB::table('tbl_pesanan')->where('id_pesanan',$id_pesanan)->delete();
    }
    //

    //Delete Data Dari DB
    public function deletePesananDetail($id_pesanan_detail)
    {
        DB::table('tbl_pesanan_detail')->where('id_pesanan_detail',$id_pesanan_detail)->delete();
    }
    //
}
