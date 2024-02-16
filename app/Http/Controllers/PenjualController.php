<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualModel;
use App\Models\ProdukModel;

class PenjualController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->PenjualModel = new PenjualModel();
        $this->ProdukModel = new ProdukModel();
    }

    //Method Index
    public function index()
    {
       $data = [
            'penjual' => $this->PenjualModel->allData(),
       ];
        return view('penjual/v_penjual',$data);
    }
    //

    //Method Detail
    public function detail($id_penjual)
    {
        if (!$this->PenjualModel->detailData($id_penjual)){
            abort(404);
        }
       $data = [
            'penjual' => $this->PenjualModel->detailData($id_penjual),
       ];
        return view('penjual/v_detail_penjual',$data);
    }
    //

    //Method Add
    public function add()
    {
        return view('penjual/v_add_penjual');
    }
    //

    //Method Insert
    public function insert()
    {
        Request()->validate([
            'id_penjual'          =>'required|unique:tbl_penjual,id_penjual|max:10',
            'nama_penjual'          =>'required',
            'alamat'                =>'required',
            'telepon'               =>'required',
        ],[
            'id_penjual.required' =>'Wajib Diisi',
            'id_penjual.unique'   =>'id_penjual Ini Sudah Ada',
            'id_penjual.max'      =>'id_penjual Max 10 Karakter',
            'nama_penjual.required' =>'Wajib Diisi',
            'alamat.required'       =>'Wajib Diisi',
            'telepon.required'      =>'Wajib Diisi',
        ]);
        $data = [
            'id_penjual'          => Request()->id_penjual,
            'nama_penjual'          => Request()->nama_penjual,
            'alamat'                => Request()->alamat,
            'telepon'               => Request()->telepon,
        ];
        $this->PenjualModel->addData($data);
        return redirect()->route('penjual')->with('Pesan','Data Berhasil Di tambahkan');
    }
    //

    //Method Edit
    public function edit($id_penjual)
    {
        if (!$this->PenjualModel->detailData($id_penjual)){
            abort(404);
        }
        $data = [
        'penjual' => $this->PenjualModel->detailData($id_penjual),
   ];
        return view('penjual/v_edit_penjual',$data);
    }
    //

    //Method Update
    public function update($id_penjual)
    {
        Request()->validate([
            'id_penjual'          => 'required|max:10',
            'nama_penjual'          => 'required',
            'alamat'                => 'required',
            'telepon'               => 'required',
        ],[
            'id_penjual.required' =>'Wajib Diisi',
            'id_penjual.max'      =>'id_penjual Max 10 Karakter',
            'nama_penjual.required' => 'Wajib Diisi',
            'alamat.required'       => 'Wajib Diisi',
            'telepon.required'      => 'Wajib Diisi',
        ]);
        $data = [
            'id_penjual'          => Request()->id_penjual,
            'nama_penjual'          => Request()->nama_penjual,
            'alamat'                => Request()->alamat,
            'telepon'               => Request()->telepon,
        ];
        $this->PenjualModel->editData($id_penjual,$data);
        return redirect()->route('penjual')->with('Pesan','Data Berhasil Di Update');
    }
    //

    //Method Delete
    public function delete($id_penjual)
    {
        $this->PenjualModel->deleteData($id_penjual);
        return redirect()->route('penjual')->with('Pesan','Data Berhasil Di Hapus');
    }
    //

    //Method Print
    public function print()
    {
       $data = [
            'penjual' => $this->PenjualModel->allData(),
       ];

        return view('penjual/v_print_penjual',$data);
    }

    //produk terjual
    public function print_penjualan($id_penjual)
    {
       $data = [
            'produk' => $this->ProdukModel->allDataPenjualan($id_penjual),
            'total_harga' => $this->ProdukModel->total_harga($id_penjual),
       ];
        return view('produk/v_print_penjualan',$data);
    }
    //
    //
}
