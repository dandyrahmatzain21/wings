<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\ShiftRight;

class ProdukModel extends Model
{
    use HasFactory;
    //Ambil Data Dari DB
    public function allData($id_penjual)
    {
        return DB::table('tbl_produk')->where('id_penjual','=',$id_penjual)->get();
    }
    //
    public function allProduk()
    {
        return DB::table('tbl_produk')
        ->join('tbl_kategori','tbl_produk.id_kategori','=','tbl_kategori.id_kategori')
        ->get();
    }

    //Mengambil Data Dari DB
    public function ListData()
    {
        /*
        SELECT *
        FROM tbl_produk
        JOIN tbl_kategori ON tbl_produk.id_kategori = tbl_kategori.id_kategori
        JOIN users ON tbl_produk.id_penjual = users.id
        */

        return DB::table('tbl_produk')
        ->join('tbl_kategori','tbl_produk.id_kategori','=','tbl_kategori.id_kategori')
        ->join('users','tbl_produk.id_penjual','=','users.id')
        //->get();
        ->where('tbl_produk.status','=',2)->get();
    }

    //Mengambil Data Dari DB
    public function ListData2()
    {

        return DB::table('tbl_produk')
        ->where('tbl_produk.status','=',2)->get();
    }
    //

    //Mengambil Data Dari DB
    public function allDataVerifikasi()
    {
        return DB::table('tbl_produk')->where('status','=','1')->get();

    }
    //

    //Ambil Data Berdasarkan Id Dari DB
    public function detailData($id_produk)
    {
        return DB::table('tbl_produk')
        ->join('tbl_kategori','tbl_produk.id_kategori','=','tbl_kategori.id_kategori')
        ->where('id_produk', $id_produk)->first();
    }
    //

    //Insert Data Ke DB
    public function addData($data)
    {
        DB::table('tbl_produk')->insert($data);
    }
    //

    //Insert Data Ke DB
    public function addDataPesananDetail($data_pesanan_detail)
    {
        DB::table('tbl_pesanan_detail')->insert($data_pesanan_detail);
    }
    //

    //Insert Data Ke DB
    public function addDataPesanan($data_pesanan)
    {
        DB::table('tbl_pesanan')->insert($data_pesanan);
    }
    //

    //Update Data Ke DB
    public function editData($id_produk,$data)
    {
        DB::table('tbl_produk')->where('id_produk',$id_produk)->update($data);
    }
    //

    //Delete Data Ke DB
    public function deleteData($id_produk)
    {
        DB::table('tbl_produk')->where('id_produk',$id_produk)->delete();
    }
    //

    /*Urutkan Data Dari DB Lalu Di Urutkan Secara Descending Dan Diambil 1 Dari Yg Paling Atas
    public function getId()
    {
        $getId = DB::table('tbl_produk')->orderBy('id_produk','DESC')->take(1)->get();
        foreach ($getId as $value)
        $idbr = $value->id_produk;
        return $kode_produk = 'PDK'.$idbr+1;
    }
    */
    //Mengambil Data Dari DB
    public function allDataPenjualan($id_penjual)
    {
        return DB::table('tbl_produk')
        ->join('tbl_pesanan_detail','tbl_produk.id_produk','=','tbl_pesanan_detail.id_produk')
        ->join('tbl_pembayaran','tbl_pesanan_detail.id_pesanan','=','tbl_pembayaran.id_pesanan')
        ->join('tbl_pesanan','tbl_pembayaran.id_pesanan','=','tbl_pesanan.id_pesanan')
        ->where('tbl_pembayaran.status','=','2')
        ->where('id_penjual','=',$id_penjual)
        ->select('tbl_produk.id_produk','tbl_produk.nama_produk','tbl_produk.kode_produk','tbl_produk.gambar','tbl_produk.stok','tbl_produk.harga','tbl_pesanan_detail.id_produk','tbl_pesanan_detail.id_pesanan','tbl_pesanan_detail.jumlah','tbl_pembayaran.id_pesanan','tbl_pembayaran.status','tbl_pesanan.id_pesanan','tbl_pesanan.customer_name','tbl_pesanan.subtotal')
        ->get();
    }
    //
    public function total_harga($id_penjual)
    {
        return DB::table('tbl_produk')
        ->join('tbl_pesanan_detail','tbl_produk.id_produk','=','tbl_pesanan_detail.id_produk')
        ->join('tbl_pembayaran','tbl_pesanan_detail.id_pesanan','=','tbl_pembayaran.id_pesanan')
        ->join('tbl_pesanan','tbl_pembayaran.id_pesanan','=','tbl_pesanan.id_pesanan')
        ->where('tbl_pembayaran.status','=','2')
        ->where('id_penjual','=',$id_penjual)
        ->sum('tbl_pesanan.subtotal');
    }

    public function LaporanProduk($id_penjual)
    {
        return DB::table('tbl_produk')
        ->where('id_penjual','=',$id_penjual)
        ->where('status','=','2')
        ->get();
    }
    //

    public function TotalPenghasilan($id_penjual)
    {
        return DB::table('tbl_produk')
        ->where('id_penjual','=',$id_penjual)
        ->where('status','=','2')
        ->sum('penghasilan');
    }
    //
}
