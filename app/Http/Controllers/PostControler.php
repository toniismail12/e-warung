<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostControler extends Controller
{
   public function index(Request $request)

   {

    $title = '';

    
    $data = Post::where("slug", $request->nik)->first();
    $p = "hhh";
    $nama = "";
    $alamat = "";

    if($data)
    {
        $nama = $data->title;
        $alamat = $data->excert;
        $p = "oke";
    }

    elseif($request->nik)
    {
        $nama = "";
        $alamat = "";
        $p = "nil";
    }

    return view('post', [
            'tittle' => "Cek Penerima",

            'title' => "All Post" .$title,

            // 'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString(),

            "nama" => $nama,
            "alamat" => $alamat,
            "p" => $p,

        ]);
   }

   public function show(Post $post)
   {
    return view('posts',
    [
        'tittle' => "single post",

        'posts' => $post
    ]);
   }



}
