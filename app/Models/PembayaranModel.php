<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PembayaranModel extends Model
{
    use HasFactory;

    //Insert Data Ke DB
    public function addDataPembayaran($data)
    {
        DB::table('tbl_pembayaran')->insert($data);
    }

    //Ambil Data Dari DB
    public function allData($id_customer)
    {
        return DB::table('tbl_pembayaran')
        ->join('tbl_pesanan','tbl_pembayaran.id_pesanan','=','tbl_pesanan.id_pesanan')
        ->join('tbl_produk','tbl_produk.id_produk','=','tbl_pembayaran.id_produk')
        ->select('tbl_produk.id_produk','tbl_produk.nama_produk','tbl_pembayaran.*')
        ->where('customer_id','=',$id_customer)->get();
    }
    //

    //Mengambil Data Dari DB
    public function allDataPenjual($id_penjual)
    {
        return DB::table('tbl_produk')
        ->join('tbl_pesanan_detail','tbl_produk.id_produk','=','tbl_pesanan_detail.id_produk')
        ->join('tbl_pembayaran','tbl_pesanan_detail.id_pesanan','=','tbl_pembayaran.id_pesanan')
        ->where('id_penjual','=',$id_penjual)->get();
    }
    //

    //Ambil Data Dari DB Berdasarikan Id Yg Di Tentukan
    public function detailData($id_pembayaran)
    {
        return DB::table('tbl_pembayaran')
        ->join('tbl_produk','tbl_pembayaran.id_produk','=','tbl_produk.id_produk')
        ->join('tbl_pesanan','tbl_pembayaran.id_pesanan','=','tbl_pesanan.id_pesanan')
        ->select('tbl_produk.id_produk','tbl_produk.nama_produk','tbl_produk.harga','tbl_pembayaran.*','tbl_pesanan.*')
        ->where('id_pembayaran', $id_pembayaran)->first();
    }
    //

    //Ambil Data Dari DB
    public function ListData()
    {
        return DB::table('tbl_pembayaran')->get();
    }
    //

    public function allDataVerifikasi($id_penjual)
    {
        return DB::table('tbl_pembayaran')
        ->join('tbl_pesanan_detail','tbl_pembayaran.id_pesanan','=','tbl_pesanan_detail.id_pesanan')
        ->join('tbl_produk','tbl_pesanan_detail.id_produk','=','tbl_produk.id_produk')
        ->where('tbl_pembayaran.status','=','3')
        ->where('id_penjual','=',$id_penjual)
        ->select('tbl_produk.id_produk','tbl_pembayaran.*','tbl_pesanan_detail.*')
        ->get();
    }
    //

    //Insert Data Ke DB
    public function verifikasi($id_pembayaran,$data)
    {
        DB::table('tbl_pembayaran')->where('id_pembayaran',$id_pembayaran)->update($data);
    }
    //

    //Insert Data Ke DB
    public function pembayaran_keranjang($id_pesanan_detail,$data)
    {
        DB::table('tbl_pembayaran')->where('id_pembayaran',$id_pesanan_detail)->update($data);
    }
    //
}
