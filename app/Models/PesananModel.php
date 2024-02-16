<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PesananModel extends Model
{
    use HasFactory;

    //Mengambil Data Dari DB
    public function allData($id_customer)
    {
       return DB::table('tbl_pesanan')->where('customer_id', '=',$id_customer)->get();

    }
    //

    //Mengambil Data Dari DB
    public function allData2($id_customer)
    {
       return DB::table('tbl_pesanan')
       ->join('tbl_pesanan_detail','tbl_pesanan.id_pesanan','=','tbl_pesanan_detail.id_pesanan')
       ->where('customer_id', '=',$id_customer)->get();

    }
    //

    //Mengambil Data Dari DB
    public function allDataDiPesanan($id_penjual)
    {
        return DB::table('tbl_produk')
        ->join('tbl_pesanan','tbl_pesanan.id_produk','=','tbl_produk.id_produk')
        ->where('id_penjual','=',$id_penjual)->get();
    }
    //
    //Mengambil Data Dari DB
    public function ListData()
    {
       return DB::table('tbl_pesanan')->get();

    }
    //
    //Mengambil Data Dari DB
    public function ListData2()
    {
       return DB::table('tbl_pesanan')->get();
    }
    //

    //Ambil Data Dari DB Berdasarikan Id Yg Di Tentukan
    public function detailData($id_pesanan)
    {
        return DB::table('tbl_pesanan')
        ->join('tbl_pesanan_detail','tbl_pesanan.id_pesanan','=','tbl_pesanan_detail.id_pesanan')
        ->where('tbl_pesanan.id_pesanan', $id_pesanan)->first();
    }
    //

    //Ambil Data Dari DB Dan Di Join (Tujuan Untuk Mengambil Filed Stok Dari TBL Obat)
    public function detailPesananProduk($id_pesanan)
    {
        return DB::table('tbl_pesanan_detail')->join('tbl_pesanan','tbl_pesanan_detail.id_pesanan','=','tbl_pesanan.id_pesanan')->get()->where('id_pesanan', $id_pesanan)->first();
    }

    //Insert Data Ke DB
    public function addData($data)
    {
        DB::table('tbl_pesanan')->insert($data);
    }
    //

    //Insert Data Ke DB
    public function addDataPembayaran($data)
    {
        DB::table('tbl_pembayaran')->insert($data);
    }

    //Update Data Ke DB
    public function editData($id_pesanan,$data)
    {
        DB::table('tbl_pesanan')->where('id_pesanan',$id_pesanan)->update($data);
    }
    //

    //Delete Data Dari DB
    public function deleteData($id_pesanan)
    {
        DB::table('tbl_pesanan')->where('id_pesanan',$id_pesanan)->delete();
    }
    //

    //Insert Data Ke DB
    public function bayar($id_pembayaran,$data)
    {
        DB::table('tbl_pembayaran')->where('id_pembayaran',$id_pembayaran)->update($data);
    }
    //

    public function bayar_via_admin($data4)
    {
        DB::table('tbl_pembayaran_admin')->insert($data4);
    }

    //Insert Data Ke DB
    public function bayarKeranjang($data3)
    {
        DB::table('tbl_pembayaran')->insert($data3);
    }
    //

    //Insert Data Ke DB
    public function pesanan($id_customer)
    {
        $jumlah = DB::table('tbl_pesanan_detail')
        ->join('tbl_pesanan','tbl_pesanan_detail.id_pesanan','=','tbl_pesanan.id_pesanan')->where('customer_id','=',$id_customer)->count('id_pesanan_detail');
    }
    //

    //Insert Data Ke DB
    public function pesanan_detail()
    {
        return DB::table('tbl_pesanan_detail')->get();
    }
    //

    //Insert Data Ke DB
    public function kirim_barang($id_pesanan,$data)
    {
        DB::table('tbl_pesanan')->where('id_pesanan',$id_pesanan)->update($data);
    }

    public function batalkan_pesanan($id_pesanan,$data)
    {
        DB::table('tbl_pesanan')->where('id_pesanan',$id_pesanan)->update($data);
    }
    //
    public function konfirmasi_terima_barang($id_pesanan,$data)
    {
        DB::table('tbl_pesanan')->where('id_pesanan',$id_pesanan)->update($data);
    }

    //Ambil Data Dari DB Berdasarikan Id Yg Di Tentukan
    public function invoice($id_pesanan)
    {
        return DB::table('tbl_pesanan')
        ->join('tbl_pesanan_detail','tbl_pesanan.id_pesanan','=','tbl_pesanan_detail.id_pesanan')
        ->join('tbl_produk','tbl_pesanan_detail.id_produk','=','tbl_produk.id_produk')
        ->where('tbl_pesanan.id_pesanan', $id_pesanan)->first();
    }
    //
}
