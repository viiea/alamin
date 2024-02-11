<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LogActController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\PengeluaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/guest/home', [App\Http\Controllers\HomeController::class, 'index'])->name('guest.home');

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('admin');
Route::get('/ketua/home', [App\Http\Controllers\HomeController::class, 'ketuaHome'])->name('ketua.home')->middleware('ketua');


Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
Route::get('/pengeluaran/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
Route::post('/pengeluaran/store', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
Route::get('/pengeluaran/edit/{id}', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
Route::post('/pengeluaran/update', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
Route::post('/pengeluaran/delete', [PengeluaranController::class, 'destroy'])->name('pengeluaran.delete');
Route::get('/pengeluaran/getData',[PengeluaranController::class, 'getData'])->name('pengeluaran.getData');


Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
Route::get('/pemasukan/create', [PemasukanController::class, 'create'])->name('pemasukan.create');
Route::post('/pemasukan/store', [PemasukanController::class, 'store'])->name('pemasukan.store');
Route::get('/pemasukan/edit/{id}', [PemasukanController::class, 'edit'])->name('pemasukan.edit');
Route::post('/pemasukan/update', [PemasukanController::class, 'update'])->name('pemasukan.update');
Route::post('/pemasukan/delete', [PemasukanController::class, 'destroy'])->name('pemasukan.delete');
Route::get('/pemasukan/getData',[PemasukanController::class, 'getData'])->name('pemasukan.getData');



Route::get('/jenis', [JenisController::class, 'index'])->name('jenis.index');
Route::get('/jenis/create', [JenisController::class, 'create'])->name('jenis.create');
Route::post('/jenis/store', [JenisController::class, 'store'])->name('jenis.store');
Route::get('/jenis/edit/{id}', [JenisController::class, 'edit'])->name('jenis.edit');
Route::post('/jenis/update', [JenisController::class, 'update'])->name('jenis.update');
Route::post('/jenis/delete', [JenisController::class, 'destroy'])->name('jenis.delete');

Route::get('/donatur', [DonaturController::class, 'index'])->name('donatur.index');
Route::get('/donatur/create', [DonaturController::class, 'create'])->name('donatur.create');
Route::get('/donatur/edit/{id}', [DonaturController::class, 'edit'])->name('donatur.edit');
Route::post('/donatur/store', [DonaturController::class, 'store'])->name('donatur.store');
Route::post('/donatur/update', [DonaturController::class, 'update'])->name('donatur.update');
Route::post('/donatur/delete', [DonaturController::class, 'destroy'])->name('donatur.delete');


Route::get('/log/index', [LogActController::class,'index'])->name('log.index');
Route::get('/log/getData', [LogActController::class,'getData'])->name('log.getData');


Route::get('/admin/user/index', [UserController::class,'index'])->name('admin.user.index')->middleware('admin');
Route::get('/admin/user/getData', [UserController::class,'getData'])->name('admin.user.getData')->middleware('admin');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create')->middleware('admin');
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store')->middleware('admin');
Route::post('/admin/user/update', [UserController::class, 'update'])->name('admin.user.update');
Route::post('/admin/user/destroy', [UserController::class, 'destroy'])->name('admin.user.delete')->middleware('admin');

//pdf
Route::get('/pengeluaran/pdf',[PengeluaranController::class,'getPDF'])->name('pengeluaran.pdf');
Route::get('/pemasukan/pdf',[PemasukanController::class,'getPDF'])->name('pemasukan.pdf');

//download
Route::get('/pemasukan/download/{id}',[PemasukanController::class,'download'])->name('pemasukan.download');
Route::get('/pengeluaran/download/{id}',[PengeluaranController::class,'download'])->name('pengeluaran.download');
Route::get('/donatur/download/{id}',[DonaturController::class,'download'])->name('donatur.download');