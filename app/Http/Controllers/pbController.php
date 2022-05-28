<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\Keranjang;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class pbController extends Controller
{
    public function index()
    {
        return view('dashboard-pb.index');
    }

    public function editpassword()
    {
        return view('dashboard-pb.edit-password');

    }

    public function newpassword(Request $request)
    {
        User::where('id', auth()->user()->id)->update([
           
            "password" => Hash::make($request->password),
           
        ]);

        return redirect('/edit-password')->with('success', 'Berhasil Update Password!!');
    }

    public function resetpassword($nik)
    {

        User::where('username', $nik)->update([
           
            "password" => Hash::make($nik),
           
        ]);

        return redirect('/dashboard/posts')->with('success', 'Berhasil reset Password!!');
    }

    public function dbpb()
    {
        return view('dashboard-pb.data-barang-pb', [
            'barang' => DataBarang::all(),
        ]);
    }

    public function addkeranjang($id)
    {
        $totalkeranjang = Keranjang::where("user_id", auth()->user()->username)->sum("total");

        if($totalkeranjang > 199999){
            return redirect('/data-barang-pb')->with('success', 'Total Keranjang Terlampui, Maks 200rb !!');
        }

        $data = DataBarang::where("id", $id)->first();

        $totalbelanja = Keranjang::where([["user_id", auth()->user()->username],["nama_barang", $data->nama_barang]])->count();

        if($totalbelanja > 0)
        {
            $barang = Keranjang::where([["user_id", auth()->user()->username],["nama_barang", $data->nama_barang]])->first();

            $harga=$barang->harga;
            $jumlah=$barang->jumlah+1;
            
            $total=$harga*$jumlah;

            Keranjang::where("nama_barang", $data->nama_barang)->update([
                "jumlah"=>$jumlah,
                "total"=>$total,
            ]);
        }
        else{
            $harga=$data->harga;
            $jumlah=1;
            
            $total=$harga*$jumlah;

            Keranjang::create([
                "nama_barang" => $data->nama_barang,
                "user_id" => auth()->user()->username,
                "ewarung" => $data->ewarung,
    
                "harga" => $data->harga,
                "jumlah"=>$jumlah,
                "total"=>$total,
            ]);
        }


        return redirect('/data-barang-pb')->with('success', 'Berhasil tambah barang!!');
    }

    public function keranjangsaya()
    {
        return view('dashboard-pb.keranjang-saya', [
            "total_jumlah" => Keranjang::where("user_id", auth()->user()->username)->sum("total"),
            'barang' => Keranjang::where("user_id", auth()->user()->username)->get(),
        ]);
    }

    public function hapuskeranjang($id)
    {
        Keranjang::where("id", $id)->delete();

        return redirect('/keranjang-saya')->with('success', 'Berhasil Hapus barang!!');
    }

    public function lihatkeranjang($user_id)
    {
        return view('dashboard.laporan.lihat-keranjang', [
            "total_jumlah" => Keranjang::where("user_id", $user_id)->sum("total"),
            'barang' => Keranjang::where("user_id", $user_id)->get(),
        ]);
    }
}
