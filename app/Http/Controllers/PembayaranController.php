<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembayaranModel;
use App\Models\KeranjangModel;
use App\Models\PesananModel;
use App\Models\DashboardModel;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class PembayaranController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->PembayaranModel = new PembayaranModel();
        $this->KeranjangModel = new KeranjangModel();
        $this->PesananModel = new PesananModel();
        $this->DashboardModel = new DashboardModel();
    }

    //Method Index
    public function index($id_customer)
    {
        $data = [
            'pembayaran' => $this->PembayaranModel->allData($id_customer),
        ];
        return view('pembayaran/v_pembayaran_customer2', $data);
    }
    //

    //Method Index
    public function index_penjual($id_penjual)
    {
        $data = [
            'pembayaran' => $this->PembayaranModel->allDataPenjual($id_penjual),
        ];
        return view('pembayaran/v_pembayaran_customer', $data);
    }
    //

    //Method list_verifikasi
    public function list_pembayaran()
    {
        $data = [
            'pembayaran' => $this->PembayaranModel->ListData(),
        ];
        return view('pembayaran/v_pembayaran_customer', $data);
    }
    //
    
    //Method list_verifikasi
    public function list_verifikasi($id_penjual)
    {
        $data = [
            'pembayaran' => $this->PembayaranModel->allDataVerifikasi($id_penjual),
        ];
        return view('pembayaran/v_list_verifikasi', $data);
    }
    //

    public function verifikasi($id_pembayaran)
    {
        $id_penjual = auth()->user()->id;
        Request()->validate([
            'id_pembayaran'                  => 'required',
            'id_pesanan' => 'required',
            'nama' => 'required',
            'tanggal_bayar' => 'required',
            'status' => 'required',
        ], [
            'id_pembayaran.required'         => 'Wajib Diisi',
            'id_pesanan.required'         => 'Wajib Diisi',
            'nama.required'         => 'Wajib Diisi',
            'tanggal_bayar.required'         => 'Wajib Diisi',
            'status.required'         => 'Wajib Diisi',
        ]);

        $data = [
            'id_pembayaran'                  => Request()->id_pembayaran,
            'id_pesanan'                  => Request()->id_pesanan,
            'nama'                  => Request()->nama,
            'tanggal_bayar'                  => Request()->tanggal_bayar,
            'status'                  => Request()->status,
        ];
        $this->PembayaranModel->verifikasi($id_pembayaran, $data);
        return redirect()->route('list_verifikasi', $id_penjual)->with('Pesan', 'Data Berhasil Di tambahkan');
    }
    //

    //Method Index
    public function pembayaran_keranjang($id_pesanan_detail)
    {
        $id_customer = Auth()->user()->id;
        $data = [
            'keranjang' => $this->KeranjangModel->allDataKeranjang($id_pesanan_detail),
            'keranjang2' => $this->KeranjangModel->allDataKeranjang2($id_pesanan_detail),
            'total_harga' => $this->KeranjangModel->test($id_customer),
        ];
        return view('keranjang/v_pembayaran_keranjang', $data);
    }
    //

    public function pembayaran_keranjang_update(Request $request)
    {
        $id_customer = Auth()->user()->id;
        $id_pesanan_detail = Auth()->user()->id;

        $data = [
            'status'                  => Request()->status,
            'customer_name'                  => Request()->customer_name,
            'customer_phone'                  => Request()->customer_phone,
            'customer_address'                  => Request()->customer_address,
        ];
        $this->KeranjangModel->allDataKeranjangUpdate($id_pesanan_detail, $data);

        $data2 = $request->all();
        if (count($data2['id_pesanan_detail']) > 0) {
            foreach ($data2['id_pesanan_detail'] as $item => $value) {
                $data3 = array(
                    'id_pembayaran' => $data2['id_pembayaran'][$item],
                    'kode_pembayaran' => Request()->kode_pembayaran,
                    'id_produk' => $data2['id_produk'][$item],
                    'id_pesanan' => $data2['id_pesanan2'][$item],
                    'nama' => $data2['nama'][$item],
                    'jumlah' => $data2['jumlah'][$item],
                    'subtotal' => $data2['subtotal'][$item],
                    'metode_pembayaran' => Request()->metode_pembayaran,
                    'metode_pengiriman' => Request()->metode_pengiriman,
                    'status' => $data2['status2'][$item],
                );
                $this->PesananModel->bayarKeranjang($data3);
            }
        }
        return redirect()->route('pesanan', $id_customer)->with('Pesan', 'Data Berhasil Di tambahkan');
    }
    //

    //Method Print Lap.Penjualan
    public function cari_kode_pembayaran($level_user, $kode_pembayaran)
    {
        $cari_kode_pembayaran = DB::table('tbl_pembayaran')
            ->join('tbl_produk', 'tbl_produk.id_produk', '=', 'tbl_pembayaran.id_produk')
            ->select('tbl_pembayaran.*', 'tbl_produk.id_produk', 'tbl_produk.nama_produk', 'tbl_produk.harga')
            ->where('metode_pembayaran', $level_user)
            ->where('kode_pembayaran', $kode_pembayaran)->get();
        return view('pembayaran/v_cari_kode_pembayaran', compact('cari_kode_pembayaran'));
    }
    //

    //Method Print
    public function print()
    {
        $data = [
            'pembayaran' => $this->PembayaranModel->ListData(),
        ];

        return view('pembayaran/v_print_pembayaran', $data);
    }
    //

    //Method Print Lap.Penjualan
    public function print_pembayaran_per_tgl($tgl_awal_pembayaran, $tgl_akhir_pembayaran)
    {
        $pembayaran = DB::table('tbl_pembayaran')->whereBetween('tanggal_bayar', [$tgl_awal_pembayaran, $tgl_akhir_pembayaran])->get();
        return view('pembayaran/v_print_pembayaran_per_tgl', compact('pembayaran', 'tgl_awal_pembayaran', 'tgl_akhir_pembayaran'));
    }
    //
}
