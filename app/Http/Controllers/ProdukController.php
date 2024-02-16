<?php

namespace App\Http\Controllers;

//Load Model
use Illuminate\Http\Request;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\PesananModel;
use App\Models\PenjualModel;
use App\Models\KeranjangModel;
use App\Models\PembayaranModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class ProdukController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->ProdukModel        = new ProdukModel();
        $this->KategoriModel    = new KategoriModel();
        $this->PesananModel = new PesananModel();
        $this->PenjualModel     = new PenjualModel();
        $this->KeranjangModel     = new KeranjangModel();
        $this->PembayaranModel     = new PembayaranModel();
    }

    //Method Index
    public function index($id_penjual)
    {
        $data = [
            'produk'          => $this->ProdukModel->allData($id_penjual),
        ];
        return view('produk/v_produk', $data);
    }
    //

    //Method Index
    public function index_adm()
    {
        $data = [
            'allProduk' => $this->ProdukModel->allProduk(),
            'produk'          => $this->ProdukModel->ListData(),
            'produk2'          => $this->ProdukModel->ListData2(),
        ];
        return view('produk/v_produk', $data);
    }
    //

    //Method Index
    public function index_all()
    {
        $id_customer = Auth()->user()->id;
        $data = [
            'produk'          => $this->ProdukModel->ListData(),
            'produk2'          => $this->ProdukModel->ListData2(),
            'total_keranjang' => $this->KeranjangModel->total_keranjang($id_customer),
        ];
        return view('produk/v_produk_front_end', $data);
    }
    //

    //Method Detail
    public function detail($id_produk)
    {
        if (!$this->ProdukModel->detailData($id_produk)) {
            abort(404);
        }
        $data = [
            'produk' => $this->ProdukModel->detailData($id_produk),
        ];
        return view('produk/v_detail_produk', $data);
    }
    //

    //Method Add
    public function add()
    {
        $id_penjual = auth()->user()->id;
        $data = [
            //'kode_produk'    => $this->ProdukModel->getId(),
            'kategori'     => $this->KategoriModel->allData($id_penjual),
        ];
        return view('produk/v_add_produk', $data);
    }
    //

    //Method Insert
    public function insert()
    {
        Request()->validate([
            'id_produk'         => 'required|unique:tbl_produk,id_produk',
            'id_penjual'        => 'required',
            'nama_produk'       => 'required',
            'kode_produk'       => 'required',
            'id_kategori'       => 'required',
            'deskripsi'         => 'required',
            'gambar'            => 'required|mimes:jpg,jpeg,png|max:1024',
            'stok'              => 'required',
            'harga'             => 'required',
            'berat'             => 'required',
            'status'            => 'required',
        ], [
            'id_produk.required'            => 'Wajib Diisi',
            'id_penjual.required'           => 'Wajib Diisi',
            'id_penjual.unique'             => 'Id Produk Ini Sudah Ada',
            'nama_produk.required'          => 'Wajib Diisi',
            'kode_produk.required'          => 'Wajib Diisi',
            'id_kategori.required'          => 'Wajib Diisi',
            'deskripsi.required'            => 'Wajib Diisi',
            'gambar.required.required'      => 'Wajib Diisi',
            'stok.required'                 => 'Wajib Diisi',
            'harga.required'                => 'Wajib Diisi',
            'berat.required'                => 'Wajib Diisi',
            'status.required'               => 'Wajib Diisi',
        ]);
        $file       = Request()->gambar;
        $filename   = Request()->id_produk . '.' . $file->extension();
        $file->move(public_path('gambar'), $filename);
        $data = [
            'id_produk'         => Request()->id_produk,
            'id_penjual'        => Request()->id_penjual,
            'nama_produk'       => Request()->nama_produk,
            'kode_produk'       => Request()->kode_produk,
            'id_kategori'       => Request()->id_kategori,
            'deskripsi'         => Request()->deskripsi,
            'gambar'            => $filename,
            'stok'              => Request()->stok,
            'harga'             => Request()->harga,
            'berat'             => Request()->berat,
            'status'            => Request()->status,
        ];

        $id_penjual = Auth()->user()->id;
        $this->ProdukModel->addData($data);
        return redirect()->route('produk', $id_penjual)->with('Pesan', 'Data Berhasil Di tambahkan');
    }
    //

    //Method Edit
    public function edit($id_produk)
    {
        if (!$this->ProdukModel->detailData($id_produk)) {
            abort(404);
        }
        $id_penjual = auth()->user()->id;
        $data = [
            'produk'          => $this->ProdukModel->detailData($id_produk),
            'kategori'      => $this->KategoriModel->allData($id_penjual),
        ];
        return view('produk/v_edit_produk', $data);
    }
    //

    //Method Update
    public function update($id_produk)
    {
        Request()->validate([
            'id_produk'          => 'required',
            'id_penjual'          => 'required',
            'nama_produk'          => 'required',
            'kode_produk'          => 'required',
            'id_kategori'               => 'required',
            'deskripsi'               => 'required',
            'gambar'             => 'mimes:jpg,jpeg,png|max:1024',
            'stok'         => 'required',
            'harga'         => 'required',
            'berat'         => 'required',
            'status'       => 'required',
        ], [
            'id_produk.required'        => 'Wajib Diisi',
            'id_penjual.required'        => 'Wajib Diisi',
            'nama_produk.required'        => 'Wajib Diisi',
            'kode_produk.required'        => 'Wajib Diisi',
            'id_kategori.required'             => 'Wajib Diisi',
            'deskripsi.required'             => 'Wajib Diisi',
            'stok.required'       => 'Wajib Diisi',
            'harga.required'       => 'Wajib Diisi',
            'berat.required'       => 'Wajib Diisi',
            'status.required'     => 'Wajib Diisi',
        ]);
        if (Request()->gambar <> "") {
            $file       = Request()->gambar;
            $filename   = Request()->id_produk . '.' . $file->extension();
            $file->move(public_path('gambar'), $filename);

            $data = [
                'id_produk'         => Request()->id_produk,
                'id_penjual'         => Request()->id_penjual,
                'nama_produk'         => Request()->nama_produk,
                'kode_produk'         => Request()->kode_produk,
                'id_kategori'              => Request()->id_kategori,
                'deskripsi'              => Request()->deskripsi,
                'gambar'            => $filename,
                'stok'        => Request()->stok,
                'harga'        => Request()->harga,
                'berat'        => Request()->berat,
                'status'      => Request()->status,
            ];
            $this->ProdukModel->editData($id_produk, $data);
        } else {
            $data = [
                'id_produk'         => Request()->id_produk,
                'id_penjual'         => Request()->id_penjual,
                'nama_produk'         => Request()->nama_produk,
                'kode_produk'         => Request()->kode_produk,
                'id_kategori'              => Request()->id_kategori,
                'deskripsi'              => Request()->deskripsi,
                'stok'        => Request()->stok,
                'harga'        => Request()->harga,
                'berat'        => Request()->berat,
                'status'      => Request()->status,
            ];
            $this->ProdukModel->editData($id_produk, $data);
        }
        $id_penjual = Auth()->user()->id;
        return redirect()->route('produk', $id_penjual)->with('Pesan', 'Data Berhasil Di Update');
    }
    //

    //Method Delete
    public function delete($id_produk)
    {
        $id_penjual = Auth()->user()->id;
        $produk = $this->ProdukModel->detailData($id_produk);
        if ($produk->gambar <> "") {
            unlink(public_path('gambar') . '/' . $produk->gambar);
        }
        $this->ProdukModel->deleteData($id_produk);
        return redirect()->route('produk', $id_penjual)->with('Pesan', 'Data Berhasil Di Hapus');
    }
    //

    //Method Jual
    public function jual($id_produk)
    {
        if (!$this->ProdukModel->detailData($id_produk)) {
            abort(404);
        }
        $data = [
            'produk'      => $this->ProdukModel->detailData($id_produk),
        ];
        return view('penjualan/v_jualan', $data);
    }
    //

    //Method Jual Online
    public function jual_online($id_produk)
    {
        if (!$this->ProdukModel->detailData($id_produk)) {
            abort(404);
        }
        $data = [
            'produk'      => $this->ProdukModel->detailData($id_produk),
        ];
        return view('penjualan/v_jualan_online', $data);
    }
    //

    //Method Beli
    public function beli($id_produk)
    {
        if (!$this->ProdukModel->detailData($id_produk)) {
            abort(404);
        }
        $data = [
            'produk'      => $this->ProdukModel->detailData($id_produk),
        ];
        return view('pembelian/v_belian', $data);
    }
    //

    //Method list_verifikasi
    public function list_verifikasi_produk()
    {
        $data = [
            'produk' => $this->ProdukModel->allDataVerifikasi(),
        ];
        return view('produk/v_list_verifikasi_produk', $data);
    }
    //

    //Method verifikasi
    public function verifikasi($id_produk)
    {
        Request()->validate([
            'id_produk'          => 'required',
            'id_penjual'          => 'required',
            'nama_produk'          => 'required',
            'kode_produk'          => 'required',
            'id_kategori'               => 'required',
            'deskripsi'               => 'required',
            'gambar'             => 'mimes:jpg,jpeg,png|max:1024',
            'stok'         => 'required',
            'harga'         => 'required',
            'berat'         => 'required',
            'status'       => 'required',
        ], [
            'id_produk.required'        => 'Wajib Diisi',
            'id_penjual.required'        => 'Wajib Diisi',
            'nama_produk.required'        => 'Wajib Diisi',
            'kode_produk.required'        => 'Wajib Diisi',
            'id_kategori.required'             => 'Wajib Diisi',
            'deskripsi.required'             => 'Wajib Diisi',
            'stok.required'       => 'Wajib Diisi',
            'harga.required'       => 'Wajib Diisi',
            'berat.required'       => 'Wajib Diisi',
            'status.required'     => 'Wajib Diisi',
        ]);
        if (Request()->gambar <> "") {
            $file       = Request()->gambar;
            $filename   = Request()->id_produk . '.' . $file->extension();
            $file->move(public_path('gambar'), $filename);

            $data = [
                'id_produk'         => Request()->id_produk,
                'id_penjual'         => Request()->id_penjual,
                'nama_produk'         => Request()->nama_produk,
                'kode_produk'         => Request()->kode_produk,
                'id_kategori'              => Request()->id_kategori,
                'deskripsi'              => Request()->deskripsi,
                'gambar'            => $filename,
                'stok'        => Request()->stok,
                'harga'        => Request()->harga,
                'berat'        => Request()->berat,
                'status'      => Request()->status,
            ];
            $this->ProdukModel->editData($id_produk, $data);
        } else {
            $data = [
                'id_produk'         => Request()->id_produk,
                'id_penjual'         => Request()->id_penjual,
                'nama_produk'         => Request()->nama_produk,
                'kode_produk'         => Request()->kode_produk,
                'id_kategori'              => Request()->id_kategori,
                'deskripsi'              => Request()->deskripsi,
                'stok'        => Request()->stok,
                'harga'        => Request()->harga,
                'berat'        => Request()->berat,
                'status'      => Request()->status,
            ];
            $this->ProdukModel->editData($id_produk, $data);
        }
        $id_penjual = Auth()->user()->id;
        return redirect()->route('list_verifikasi_produk')->with('Pesan', 'Data Berhasil Di Update');
    }


    //Method Print Lap.Penjualan
    public function search($search)
    {
        $produk = DB::table('tbl_produk')
            ->join('tbl_kategori', 'tbl_produk.id_kategori', '=', 'tbl_kategori.id_kategori')
            ->join('users', 'tbl_produk.id_penjual', '=', 'users.id')
            ->where('tbl_produk.status', '=', 2)->where('tbl_produk.nama_produk', 'like', ["%" . $search . "%"])->get();

        return view('produk/v_produk_front_end', compact('produk', 'search'));
    }
    //

    //produk terjual
    public function laporan_penjualan($id_penjual)
    {
        $data = [
            'produk' => $this->ProdukModel->allDataPenjualan($id_penjual),
            'total_harga' => $this->ProdukModel->total_harga($id_penjual),
        ];
        return view('produk/v_laporan_penjualan', $data);
    }
    //

    //produk terjual
    public function laporan_produk($id_penjual)
    {
        $data = [
            'produk'          => $this->ProdukModel->LaporanProduk($id_penjual),
            'TotalPenghasilan'          => $this->ProdukModel->TotalPenghasilan($id_penjual),
        ];
        return view('produk/v_laporan_produk', $data);
    }
    //

    public function print($id_penjual)
    {
        $data = [
            'produk'          => $this->ProdukModel->LaporanProduk($id_penjual),
            'TotalPenghasilan'          => $this->ProdukModel->TotalPenghasilan($id_penjual),
        ];

        return view('produk/v_print_produk', $data);
    }

    public function print_semuaproduk()
    {
        $data = [
            'produk'          => $this->ProdukModel->ListData(),
        ];

        return view('produk/v_print_semuaproduk', $data);
    }
}
