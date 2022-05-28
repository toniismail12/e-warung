<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\Post;
use Illuminate\Http\Request;

class ewarungController extends Controller
{
    public function index()
    {

        return view('dashboard.posts.index', [
            'posts' =>Post::all(),
        ]);

        // return view('dashboard.data-peserta', [
        //     'posts' =>Post::all()
        // ]);

    }

    public function databarang()
    {

        return view('ewarung.data-barang', [
            'barang' => DataBarang::all(),
        ]);

    }

    public function tambahbarang()
    {
        return view('ewarung.tambah-barang', [
            'barang' => DataBarang::all(),
        ]);
    }

    public function tambahbarangproses(Request $request)
    {
        DataBarang::create([
           
            "nama_barang" => $request->nama_barang,
            "harga" => $request->harga,
            "user_id" => auth()->user()->id,
            "ewarung" => auth()->user()->ewarung,
            
        ]);

        return redirect('/tambah-barang')->with('success', 'Berhasil tambah barang!!');
    }
}
