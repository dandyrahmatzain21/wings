<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Models\ProdukModel;
use App\Http\Controllers\KategoriController;
use App\Models\KategoriModel;
use App\Http\Controllers\PesananController;
use App\Models\PesananModel;
use App\Http\Controllers\PenjualController;
use App\Models\PenjualModel;
use App\Http\Controllers\PembayaranController;
use App\Models\PembayaranModel;
use App\Http\Controllers\KeranjangController;
use App\Models\KeranjangModel;
use App\Http\Controllers\LaporanController;
use App\Models\LaporanModel;
use App\Http\Controllers\SlugController;
use App\Models\SlugModel;
use App\Http\Controllers\EmoneyController;
use App\Http\Controllers\TestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/',[HomeController::class,'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/test', [HomeController::class, 'test'])->name('test');
Route::post('/test_insert', [HomeController::class, 'test_insert'])->name('test_insert');

//produk
//View produk
Route::get('/produk',[ProdukController::class,'index_adm']);
//View produk
Route::get('/produk/{id_penjual}',[ProdukController::class,'index'])->name('produk');
//View produk
Route::get('/all/produk',[ProdukController::class,'index_all']);
//Detail produk
Route::get('/produk/detail/{id_produk}',[ProdukController::class,'detail']);
//Add produk
Route::get('/add/produk',[ProdukController::class,'add']);
Route::post('/produk/insert',[ProdukController::class,'insert']);
//Edit produk
Route::get('/produk/edit/{id_produk}',[ProdukController::class,'edit']);
Route::post('/produk/update/{id_produk}',[ProdukController::class,'update']);
//Hapus produk
Route::get('/produk/delete/{id_produk}',[ProdukController::class,'delete']);

//
Route::get('/list_verifikasi_produk',[ProdukController::class,'list_verifikasi_produk'])->name('list_verifikasi_produk');
Route::post('/produk/verifikasi/{id_produk}',[ProdukController::class,'verifikasi']);
//sarch
Route::get('/search/produk/{search}',[ProdukController::class,'search']);
//Print produk
Route::get('/produk/print/{id_penjual}',[ProdukController::class,'print']);
Route::get('/print/semuaproduk',[ProdukController::class,'print_semuaproduk']);

//Kategori
//View Kategori
Route::get('/kategori',[KategoriController::class,'index'])->name('kategori');
//Add Kategori
Route::get('/add/kategori',[KategoriController::class,'add']);
Route::post('/kategori/insert',[KategoriController::class,'insert']);
//Edit Kategori
Route::get('/kategori/edit/{id_kategori}',[KategoriController::class,'edit']);
Route::post('/kategori/update/{id_kategori}',[KategoriController::class,'update']);
//Hapus Kategori
Route::get('/kategori/delete/{id_kategori}',[KategoriController::class,'delete']);
//Print Kategori
Route::get('/kategori/print',[KategoriController::class,'print']);

//pesanan
//View pesanan
Route::get('/pesanan/{id_customer}',[PesananController::class,'index'])->name('pesanan');
//View pesanan
Route::get('/pesanan{id_penjual}',[PesananController::class,'index_penjual'])->name('pesanan_penjual');
//Detail pesanan
Route::get('/pesanan/detail/{id_pesanan}',[PesananController::class,'detail']);
//Edit pesanan
Route::get('/pesanan/edit/{id_pesanan}',[PesananController::class,'edit']);
Route::post('/pesanan/update/{id_pesanan}',[PesananController::class,'update']);
//Hapus pesanan
Route::get('/pesanan/delete/{id_pesanan}',[PesananController::class,'delete']);
//pesanan pembayaran
Route::get('/pesanan/pembayaran/{id_pembayaran}',[PesananController::class,'pembayaran']);
Route::post('/pesanan/bayar/{id_pembayaran}',[PesananController::class,'bayar']);
//pesanan kirim barang
Route::post('/pesanan/kirim_barang/{id_pesanan}',[PesananController::class,'kirim_barang']);
//pesanan batalkan pesanan
Route::post('/pesanan/batalkan_pesanan/{id_pesanan}',[PesananController::class,'batalkan_pesanan']);
//pesanan konfirmasi terima barang
Route::post('/pesanan/konfirmasi_terima_barang/{id_pesanan}',[PesananController::class,'konfirmasi_terima_barang']);
//invoice
Route::get('/pesanan/invoice/{id_pesanan}',[PesananController::class,'invoice']);
//Print pesanan
Route::get('/print/pesanan',[PesananController::class,'print']);

//penjual
//View penjual
Route::get('/penjual',[PenjualController::class,'index'])->name('penjual');
//Detail penjual
Route::get('/penjual/detail/{id_penjual}',[PenjualController::class,'detail']);
//Add penjual
Route::get('/penjual/add',[PenjualController::class,'add']);
Route::post('/penjual/insert',[PenjualController::class,'insert']);
//Edit penjual
Route::get('/penjual/edit/{id_penjual}',[PenjualController::class,'edit']);
Route::post('/penjual/update/{id_penjual}',[PenjualController::class,'update']);
//Hapus penjual
Route::get('/penjual/delete/{id_penjual}',[PenjualController::class,'delete']);
//Print penjual
Route::get('/penjual/print',[PenjualController::class,'print']);
Route::get('/penjualan/print/{id_penjual}',[PenjualController::class,'print_penjualan']);

//pembayaran
//index
Route::get('/pembayaran/{id_customer}',[PembayaranController::class,'index'])->name('pembayaran');
Route::get('/pembayaran/keranjang/{id_pesanan_detail}',[PembayaranController::class,'pembayaran_keranjang'])->name('pembayaran_keranjang');
Route::post('/pembayaran/keranjang/update/',[PembayaranController::class,'pembayaran_keranjang_update']);
Route::get('/pembayaran{id_penjual}',[PembayaranController::class,'index_penjual'])->name('pembayaran_penjual');
//list verifikasi
Route::get('/list_pembayaran',[PembayaranController::class,'list_pembayaran'])->name('list_pembayaran');
Route::get('/list_verifikasi/{id_penjual}',[PembayaranController::class,'list_verifikasi'])->name('list_verifikasi');
//pesanan pembayaran
Route::post('/pembayaran/verifikasi/{id_pembayaran}',[PembayaranController::class,'verifikasi']);
//Cari Kode
Route::get('/cari_kode_pembayaran/{level_user}/{kode_pembayaran}',[PembayaranController::class,'cari_kode_pembayaran']);
//Print penjual
Route::get('/print/pembayaran',[PembayaranController::class,'print']);
Route::get('/print/pembayaran_per_tgl/{tgl_awal_pembayaran}/{tgl_akhir_pembayaran}',[PembayaranController::class,'print_pembayaran_per_tgl']);

//Keranjang
Route::get('/keranjang',[KeranjangController::class,'index'])->name('keranjang');
Route::get('/keranjang/kosong',[KeranjangController::class,'keranjang_kosong'])->name('keranjang_kosong');
Route::post('/keranjang/insert/',[KeranjangController::class,'insert']);
Route::get('/keranjang/add/{id_keranjang}',[KeranjangController::class,'add']);
Route::get('/keranjang/delete/{id_pesanan}',[KeranjangController::class,'delete']);

//Laporan
Route::get('/laporan',[LaporanController::class,'index'])->name('laporan');
Route::get('/laporan/penjualan/{id_penjual}/',[ProdukController::class,'laporan_penjualan'])->name('laporan_penjualan');
Route::get('/laporan/produk/{id_penjual}/',[ProdukController::class,'laporan_produk'])->name('laporan_produk');

//Slug
Route::get('/{slug}',[SlugController::class,'index'])->name('slug');


Route::get('/test',[TestController::class,'index'])->name('test');
