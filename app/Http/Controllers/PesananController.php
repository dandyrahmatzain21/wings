<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananModel;
use App\Models\PembayaranModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class PesananController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->PesananModel = new PesananModel();
        $this->PembayaranModel = new PembayaranModel();
    }

    //Method Index
    public function index($id_customer)
    {

        $data = [
            'pesanan' => $this->PesananModel->allData($id_customer),
        ];
        return view('pesanan/v_pesanan_customer2', $data);
    }
    //

    //Method Index
    public function index_penjual($id_penjual)
    {
        $data = [
            'pesanan' => $this->PesananModel->allDataDiPesanan($id_penjual),
        ];
        return view('pesanan/v_pesanan_customer', $data);
    }
    //

    //Method Detail
    public function detail($id_pesanan)
    {
        if (!$this->PesananModel->detailData($id_pesanan)) {
            abort(404);
        }
        $data = [
            'pesanan' => $this->PesananModel->detailData($id_pesanan),
            'produk' => $this->PesananModel->detailPesananProduk($id_pesanan),
        ];
        return view('pesanan/v_detail_pesanan', $data);
    }
    //

    //Method Add
    public function add()
    {
        return view('pesanan/v_add_pesanan');
    }

    public function insert()
    {
        Request()->validate([
            'nama_pesanan'                  => 'required',
        ], [
            'nama_pesanan.required'         => 'Wajib Diisi',
        ]);

        $data = [
            'nama_pesanan'                  => Request()->nama_pesanan,
        ];
        $this->PesananModel->addData($data);
        return redirect()->route('pesanan')->with('Pesan', 'Data Berhasil Di tambahkan');
    }
    //

    //Method Edit
    public function edit($id_pesanan)
    {
        if (!$this->PesananModel->detailData($id_pesanan)) {
            abort(404);
        }
        $data = [
            'pesanan' => $this->PesananModel->detailData($id_pesanan),
        ];
        return view('pesanan/v_edit_pesanan', $data);
    }
    //

    //Method Update
    public function update($id_pesanan)
    {
        Request()->validate([
            'nama_pesanan'                  => 'required',
        ], [
            'nama_pesanan.required'         => 'Wajib Diisi',
        ]);
        $data = [
            'nama_pesanan'                  => Request()->nama_pesanan,
        ];
        $this->PesananModel->editData($id_pesanan, $data);
        return redirect()->route('pesanan')->with('Pesan', 'Data Berhasil Di Update');
    }
    //

    //Method Delete
    public function delete($id_pesanan)
    {
        $id_customer = Auth()->user()->id;
        $pesanan = $this->PesananModel->detailData($id_pesanan);
        $this->PesananModel->deleteData($id_pesanan);
        return redirect()->route('pesanan', $id_customer)->with('Pesan', 'Data Berhasil Di Hapus');
    }
    //

    //Method Print
    public function print()
    {
        $data = [
            'pesanan' => $this->PesananModel->ListData(),
        ];

        return view('pesanan/v_print_pesanan', $data);
    }
    //

    public function pembayaran($id_pembayaran)
    {
        $data = [
            'pembayaran'      => $this->PembayaranModel->detailData($id_pembayaran),
        ];
        return view('pembayaran/v_pembayaran', $data);
    }

    public function bayar($id_pembayaran)
    {
        $data = [
            'id_pembayaran'           => Request()->id_pembayaran,
            'id_produk'               => Request()->id_produk,
            'id_pesanan'              => Request()->id_pesanan,
            'nama'                    => Request()->nama,
            'tanggal_bayar'           => Request()->tanggal_bayar,
            'jumlah'                  => Request()->jumlah,
            'subtotal'                => Request()->subtotal,
            'metode_pembayaran'       => Request()->metode_pembayaran,
            'status'                  => Request()->status,
        ];

        if (Request()->metode_pembayaran == 1) {
            $id_user = Auth()->user()->id;
            $data4 = [
                'id_admin'                => $id_user,
                'id_pembayaran'           => Request()->id_pembayaran,
                'kode_pembayaran'         => Request()->kode_pembayaran,
                'id_produk'               => Request()->id_produk,
                'id_pesanan'              => Request()->id_pesanan,
            ];
            $this->PesananModel->bayar_via_admin($data4);
        };

        $this->PesananModel->bayar($id_pembayaran, $data);
        return redirect()->route('home',)->with('Pesan', 'Data Berhasil Di tambahkan');
    }
    //

    public function kirim_barang($id_pesanan)
    {
        $data = [
            'no_resi'           => Request()->no_resi,
            'status'           => Request()->status,
        ];

        $this->PesananModel->kirim_barang($id_pesanan, $data);
        return redirect()->route('home',)->with('Pesan', 'Data Berhasil Di tambahkan');
    }

    public function batalkan_pesanan($id_pesanan)
    {
        $data = [
            'status'           => Request()->status,
        ];

        $this->PesananModel->batalkan_pesanan($id_pesanan, $data);
        return redirect()->route('home',)->with('Pesan', 'Data Berhasil Di tambahkan');
    }

    public function konfirmasi_terima_barang($id_pesanan)
    {
        $id_customer = Auth()->user()->id;
        $data = [
            'status'           => Request()->status,
        ];

        $this->PesananModel->konfirmasi_terima_barang($id_pesanan, $data);
        return redirect()->route('pesanan', $id_customer)->with('Pesan', 'Data Berhasil Di tambahkan');
    }


    //Method Invoice
    public function invoice($id_pesanan)
    {
        $data = [
            'pesanan' => $this->PesananModel->invoice($id_pesanan),
        ];
        return view('pesanan/v_invoice_pesanan', $data);
    }
    //
}
