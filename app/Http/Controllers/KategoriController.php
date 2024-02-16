<?php

namespace App\Http\Controllers;

//Load Model
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use illuminate\Support\Str;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->KategoriModel = new KategoriModel();
    }

    //Method Index
    public function index()
    {

       $data = [
            'kategori' => $this->KategoriModel->allData(),
       ];
        return view('kategori/v_kategori',$data);
    }
    //

    //Method Add
    public function add()
    {
        return view('kategori/v_add_kategori');
    }
    //

    //Method Insert
    public function insert()
    {
        Request()->validate([
            'id_kategori'          =>'required|unique:tbl_kategori,id_kategori',
            'nama_kategori'                 => 'required',
        ],[
            'id_kategori.required'        =>'Wajib Diisi',
            'id_penjual.required'        =>'Wajib Diisi',
            'id_kategori.unique'          =>'Id Produk Ini Sudah Ada',
            'nama_kategori.required'        => 'Wajib Diisi',
        ]);

        $data = [
            'id_kategori'         => Request()->id_kategori,
            'nama_kategori'                 => Request()->nama_kategori,
            'slug'            => Str::slug(Request()->nama_kategori),
        ];
        $this->KategoriModel->addData($data);
        return redirect()->route('kategori')->with('Pesan','Data Berhasil Di tambahkan');
    }
    //

    //Method Edit
    public function edit($id_kategori)
    {
        if (!$this->KategoriModel->detailData($id_kategori)){
            abort(404);
        }
        $data = [
        'kategori' => $this->KategoriModel->detailData($id_kategori),
   ];
        return view('kategori/v_edit_kategori',$data);
    }
    //

    //Method Update
    public function update($id_kategori)
    {
        Request()->validate([
            'id_kategori'          =>'required',
            'nama_kategori'                 => 'required',
        ],[
            'id_kategori.required'        =>'Wajib Diisi',
            'id_penjual.required'        =>'Wajib Diisi',
            'nama_kategori.required'        => 'Wajib Diisi',
        ]);
        $data = [
            'id_kategori'         => Request()->id_kategori,
            'nama_kategori'                 => Request()->nama_kategori,
            'slug'            => Str::slug(Request()->nama_kategori)
        ];
        $this->KategoriModel->editData($id_kategori,$data);
        return redirect()->route('kategori')->with('Pesan','Data Berhasil Di Update');
    }
    //

    //Method Delete
    public function delete($id_kategori)
    {
        $id_penjual = auth()->user()->id;
        $kategori = $this->KategoriModel->detailData($id_kategori);
        $this->KategoriModel->deleteData($id_kategori);
        return redirect()->route('kategori',$id_penjual)->with('Pesan','Data Berhasil Di Hapus');
    }
    //

    //Method Print
    public function print()
    {
       $data = [
            'kategori' => $this->KategoriModel->allData(),
       ];
        return view('kategori/v_print_kategori',$data);
    }
    //
}
