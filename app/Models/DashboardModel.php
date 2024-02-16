<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DashboardModel extends Model
{
    use HasFactory;

    //Menjumlahkan Data Dari DB
    public function JmlKategori()
    {
        return $JmlKategori = DB::table('tbl_kategori')->count('id_kategori');
    }
    //

    //Menjumlahkan Data Dari DB
    public function Jmlpenjual()
    {
        return $Jmlpenjual = DB::table('tbl_penjual')->count('id_penjual');
    }
    //


    //Menjumlahkan Data Dari DB
    public function JmlPesanan()
    {
        return $JmlPesanan = DB::table('tbl_pesanan')->count('id_pesanan');
    }
    //

    //Mengambil Data Dari DB
    public function JmlPesananPenjual($id_penjual)
    {
        return DB::table('tbl_produk')
        ->join('tbl_pesanan_detail','tbl_produk.id_produk','=','tbl_pesanan_detail.id_produk')
        ->join('tbl_pesanan','tbl_pesanan_detail.id_pesanan','=','tbl_pesanan.id_pesanan')
        ->where('id_penjual','=',$id_penjual)->count('id_penjual');
    }
    //

    //Menjumlahkan Data Dari
    public function Jmlproduk()
    {
        return $Jmlproduk = DB::table('tbl_produk')->where('status','=','2')->count('id_produk');
    }
    //

    //Menjumlahkan Data Dari
    public function JmlProdukPenjual($id_penjual)
    {
        return $Jmlproduk = DB::table('tbl_produk')->where('id_penjual','=',$id_penjual)->count('id_produk');
    }
    //

    //Menjumlahkan Data Dari
    public function JmlCustomer()
    {
        return $JmlCustomer = DB::table('users')->where('level','=','2')->count('level');
    }
    //

    //Menjumlahkan Data Dari
    public function JmlPembayaran()
    {
        return $JmlPembayaran = DB::table('tbl_pembayaran')->count('id_pembayaran');
    }
    //

    //Mengambil Data Dari DB
    public function JmlPenjualanPenjual($id_penjual)
    {
        return DB::table('tbl_produk')
        ->join('tbl_pesanan_detail','tbl_produk.id_produk','=','tbl_pesanan_detail.id_produk')
        ->join('tbl_pembayaran','tbl_pesanan_detail.id_pesanan','=','tbl_pembayaran.id_pesanan')
        ->where('id_penjual','=',$id_penjual)
        ->where('tbl_pembayaran.status','=','2')
        ->count('id_penjual');
    }
    //
    public function JmlBarangDikirim($id_penjual)
    {
        return DB::table('tbl_produk')
        ->join('tbl_pesanan_detail','tbl_produk.id_produk','=','tbl_pesanan_detail.id_produk')
        ->join('tbl_pesanan','tbl_pesanan_detail.id_pesanan','=','tbl_pesanan.id_pesanan')
        ->select(
            'tbl_pesanan.id_pesanan','tbl_pesanan.status',
            'tbl_pesanan_detail.*',
            'tbl_produk.id_produk','tbl_produk.id_penjual',
            )
        ->where('id_penjual','=',$id_penjual)
        ->where('tbl_pesanan.status','=','3')
        ->count('id_penjual');
    }
    public function JmlBarangDiterima($id_penjual)
    {
        return DB::table('tbl_produk')
        ->join('tbl_pesanan_detail','tbl_produk.id_produk','=','tbl_pesanan_detail.id_produk')
        ->join('tbl_pesanan','tbl_pesanan_detail.id_pesanan','=','tbl_pesanan.id_pesanan')
        ->select(
            'tbl_pesanan.id_pesanan','tbl_pesanan.status',
            'tbl_pesanan_detail.*',
            'tbl_produk.id_produk','tbl_produk.id_penjual',
            )
        ->where('id_penjual','=',$id_penjual)
        ->where('tbl_pesanan.status','=','4')
        ->count('id_penjual');
    }

    //Mengambil Data Dari DB
    public function JmlPenghasilanPenjual($id_penjual)
    {
        return DB::table('tbl_produk')
        ->join('tbl_pesanan_detail','tbl_produk.id_produk','=','tbl_pesanan_detail.id_produk')
        ->join('tbl_pembayaran','tbl_pesanan_detail.id_pesanan','=','tbl_pembayaran.id_pesanan')
        ->join('tbl_pesanan','tbl_pembayaran.id_pesanan','=','tbl_pesanan.id_pesanan')
        ->where('id_penjual','=',$id_penjual)
        ->where('tbl_pembayaran.status','=','2')
        ->sum('tbl_pesanan.subtotal');
    }

    public function JmlTransaksiDibatalkan($id_penjual)
    {
        return DB::table('tbl_produk')
        ->join('tbl_pesanan','tbl_produk.id_produk','=','tbl_pesanan.id_produk')
        ->select(
            'tbl_pesanan.id_pesanan','tbl_pesanan.status',
            'tbl_produk.id_produk','tbl_produk.id_penjual',
            )
        ->where('id_penjual','=',$id_penjual)
        ->where('tbl_pesanan.status','=','6','||','5')
        ->count('id_penjual');
    }
    //

    //Insert Data Ke DB
    public function testadd($data)
    {
        DB::table('test')->insert($data);
    }
    //
}
