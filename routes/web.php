<?php


use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostControler;

use App\Http\Controllers\LoginControler;
use App\Http\Controllers\RegisterControler;
use App\Http\Controllers\AdminCategoryControler;
use App\Http\Controllers\DashboardPostControler;
use App\Http\Controllers\ewarungController;
use App\Http\Controllers\pbController;

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

Route::get('/', function ()
{
    return view('home', ['tittle' => "Home"]);
});

Route::get('/about', function ()
{
    return view('about', [
        'tittle' => "About",
        'nama' => "suci",
        'gambar' => "img/toni.jpg"
    ]);
});

Route::get('/categories/', function()
{
    return view('categories',[
        'tittle' => "Categories",
        'category' => Category::all()

    ]);
});


Route::get('/blog', [PostControler::class, 'index']);

// Route::get('blog/{slug}', [PostControler::class, 'index']);

Route::get('/login', [LoginControler::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginControler::class, 'auth']);

Route::post('/logout', [LoginControler::class, 'logout']);

Route::get('/register', [RegisterControler::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterControler::class, 'store']);

Route::get('/dashboard', function()
{
    return view('dashboard.index');

})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostControler::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostControler::class)->middleware('auth');

Route::resource('dashboard/categories/', AdminCategoryControler::class)->except('show')->middleware('admin');




Route::get('/laporan-ewarung', [DashboardPostControler::class, 'lapewarung'])->middleware('auth');

Route::get('/selesai-pencairan/{id}', [DashboardPostControler::class, 'selesai'])->middleware('auth');

Route::get('export-data', [DashboardPostControler::class, 'export'])->middleware('auth');

Route::get('/ewarung', [ewarungController::class, 'index'])->middleware('auth');

Route::get('/data-barang', [ewarungController::class, 'databarang'])->middleware('auth');
Route::get('/tambah-barang', [ewarungController::class, 'tambahbarang'])->middleware('auth');
Route::post('/tambah-barang-proses', [ewarungController::class, 'tambahbarangproses'])->middleware('auth');


Route::get('/lihat-keranjang/{user_id}', [pbController::class, 'lihatkeranjang'])->middleware('auth');


// route untuk penerima bantuan
Route::get('/dashboard-pb', [pbController::class, 'index'])->middleware('auth');
Route::get('/edit-password', [pbController::class, 'editpassword'])->middleware('auth');
Route::post('/new-password', [pbController::class, 'newpassword'])->middleware('auth');
Route::get('/reset-password/{nik}', [pbController::class, 'resetpassword'])->middleware('auth');
Route::get('/data-barang-pb', [pbController::class, 'dbpb'])->middleware('auth');

Route::get('/add-keranjang/{id}', [pbController::class, 'addkeranjang'])->middleware('auth');
Route::get('/keranjang-saya', [pbController::class, 'keranjangsaya'])->middleware('auth');
Route::get('/hapus-keranjang/{id}', [pbController::class, 'hapuskeranjang'])->middleware('auth');