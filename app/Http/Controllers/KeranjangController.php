<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->KeranjangModel = new KeranjangModel();
        $this->ProdukModel = new ProdukModel();
    }

    //Method Index
    public function index()
    {
        $id_customer = Auth()->user()->id;
       $data = [
            'keranjang' => $this->KeranjangModel->allData($id_customer),
            'total_harga' => $this->KeranjangModel->test($id_customer),
       ];
        return view('keranjang/v_keranjang',$data);
    }
    //

    //Method Index
    public function keranjang_kosong()
    {
        return view('keranjang/v_keranjang_kosong');
    }
    //

    //Method Add
    public function add($id_produk)
    {
        $data=[
        'produk'          => $this->KeranjangModel->ListDataProduk($id_produk),
        ];
        return view('keranjang/v_add_keranjang',$data);
    }
    //

    public function insert()
    {
        if (Request()->jumlah > Request()->stok) {
            Request()->validate([
                'jumlah'              =>'required|size:100',
            ],[
                'jumlah.required'           =>'Wajib Diisi',
                'jumlah.size'           =>'Stok Tidak Mencukupi',
            ]);
            $data = [
                'id_pesanan_detail'         => Request()->id_pesanan_detail,
                'id_pesanan'         => Request()->id_pesanan,
                'id_produk'                 => Request()->id_produk,
                'jumlah'            => Request()->jumlah,
                'harga'            => Request()->harga,
                'berat'            => Request()->berat,
            ];
            $data2 = [
                'id_pesanan'         => Request()->id_pesanan,
                'id_produk'                 => Request()->id_produk,
                'kode_pembayaran' => Request()->kode_pembayaran,
                'invoice'                 => Request()->invoice,
                'customer_id'            => Request()->id_pesanan_detail,
                'customer_name'            => Request()->customer_name,
                'customer_phone'            => Request()->customer_phone,
                'customer_address'            => Request()->customer_address,
                'subtotal'            => Request()->subtotal,
                'metode_pembayaran' => Request()->metode_pembayaran,
                'status'            => Request()->status,
            ];
        }else{
            $data = [
                'id_pesanan_detail'         => Request()->id_pesanan_detail,
                'id_pesanan'         => Request()->id_pesanan,
                'id_produk'                 => Request()->id_produk,
                'jumlah'            => Request()->jumlah,
                'harga'            => Request()->harga,
                'berat'            => Request()->berat,
            ];
            $data2 = [
                'id_pesanan'         => Request()->id_pesanan,
                'id_produk'                 => Request()->id_produk,
                'kode_pembayaran' => Request()->kode_pembayaran,
                'invoice'                 => Request()->invoice,
                'customer_id'            => Request()->id_pesanan_detail,
                'customer_name'            => Request()->customer_name,
                'customer_phone'            => Request()->customer_phone,
                'customer_address'            => Request()->customer_address,
                'subtotal'            => Request()->subtotal,
                'metode_pembayaran' => Request()->metode_pembayaran,
                'status'            => Request()->status,
            ];
        }
        $id_penjual = Auth()->user()->id;
        $this->KeranjangModel->addData($data);
        $this->KeranjangModel->addDataPesanan($data2);
        return redirect()->route('home',$id_penjual)->with('Pesan','Data Berhasil Di tambahkan');
    }
    //

    //Method Delete
    public function delete($id_pesanan)
    {   $id_customer = Auth()->user()->id;
        $this->KeranjangModel->deleteDataPesananDetail($id_pesanan);
        if($id_pesanan=!null){
            if($this->KeranjangModel->total_keranjang($id_customer)==!null){
                return redirect()->route('keranjang')->with('Pesan','Data Berhasil Di Hapus');
            }else{
                return redirect()->route('keranjang_kosong')->with('Pesan','Data Berhasil Di Hapus');
            }
        }
        else{
            return redirect()->route('home')->with('Pesan','Data Berhasil Di Hapus');
        }
    }
    //
}
