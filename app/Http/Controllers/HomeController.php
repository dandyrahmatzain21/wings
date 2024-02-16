<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardModel;
use App\Models\ProdukModel;
use App\Models\PesananModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->DashboardModel        = new DashboardModel();
        $this->ProdukModel        = new ProdukModel();
        $this->PesananModel        = new PesananModel();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //Method Index

    public function index()
    {
        $id_penjual = optional(Auth()->user())->id;
        $level = optional(Auth()->user())->level;
        $data = [
            'produk'          => $this->ProdukModel->ListData(),
            'JmlProduk'               => $this->DashboardModel->JmlProduk(),
            'JmlProdukPenjual'               => $this->DashboardModel->JmlProdukPenjual($id_penjual),
            'JmlKategori'           => $this->DashboardModel->JmlKategori(),
            'JmlPesanan'        => $this->DashboardModel->JmlPesanan(),
            'JmlPesananPenjual'        => $this->DashboardModel->JmlPesananPenjual($id_penjual),
            'JmlPenjual'            => $this->DashboardModel->JmlPenjual(),
            'JmlCustomer'            => $this->DashboardModel->JmlCustomer(),
            'JmlPembayaran'            => $this->DashboardModel->JmlPembayaran(),
            'JmlPenjualanPenjual'            => $this->DashboardModel->JmlPenjualanPenjual($id_penjual),
            'JmlPenghasilanPenjual'            => $this->DashboardModel->JmlPenghasilanPenjual($id_penjual),
            'JmlBarangDikirim'            => $this->DashboardModel->JmlBarangDikirim($id_penjual),
            'JmlBarangDiterima'            => $this->DashboardModel->JmlBarangDiterima($id_penjual),
            'JmlTransaksiDibatalkan'            => $this->DashboardModel->JmlTransaksiDibatalkan($id_penjual),
            'pesanan_detail'            => $this->PesananModel->pesanan_detail(),
        ];

        $data2 = [
            'produk'          => $this->ProdukModel->ListData(),
        ];
        if ($level == 1 || $level == 3) {
            return view('home', $data);
        } else {
            return view('produk/v_produk_front_end', [], $data2);
        }
    }

    //Method Index
    public function test()
    {
        return view('part_front_end/template_front_end');
    }
    //

    //Method Index
    public function test_tambah()
    {
        return view('test/test_tambah');
    }
    ////Method Insert
    public function test_insert(Request $request)
    {
        $data = $request->all();
        if (count($data['test']) > 0) {
            foreach ($data['test'] as $item => $value) {
                $data2 = array(
                    'test' => $data['test'][$item],
                );

                $this->DashboardModel->testadd($data2);
            }
        }
        dd($data2);
        $id_penjual = Auth()->user()->id;
        return redirect()->route('test', $id_penjual)->with('Pesan', 'Data Berhasil Di tambahkan');
    }
    //
}
