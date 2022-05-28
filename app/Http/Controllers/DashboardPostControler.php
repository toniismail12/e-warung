<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Exports\LaporanExport;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DashboardPostControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            return view('dashboard.posts.index', [
                'posts' =>Post::all(),
            ]);

            // return view('dashboard.data-peserta', [
            //     'posts' =>Post::all()
            // ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all(),
            'ewarung' => User::where('is_admin', '0')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required | max:255',
            'image' => 'image|file',
            'slug' => 'required | unique:posts',
            // 'category_id' => 'required',
            'body' => 'required',
            'ewarung' => 'required',

        ]);

        if($request->file('image'))
        {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['keterangan'] = 'belum';
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excert'] = Str::limit(strip_tags($request->body),200);
 
        Post::create($validatedData);

        User::create([
            "name" => $request->title,
            "username" => $request->slug,
            "email" => "-",
            "password" => Hash::make($request->slug),
            "ewarung" => $request->ewarung,
            "role" => "pb",
        ]);

        return redirect('/dashboard/posts')->with('succes', 'Berhasil Di Uploud!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'ewarung' => User::where('is_admin', '0')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required | max:255',
            // 'category_id' => 'required',
            'body' => 'required',
            'ewarung' => 'required',
        ];


        if($request->slug != $post->slug)
        {
            $rules['slug'] = 'required | unique:posts';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['keterangan'] = 'belum';
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excert'] = Str::limit(strip_tags($request->body),200);

        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('succes', 'Berhasil Di Edit!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Post $post)
    {
        if($post->image)
        {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('succes', 'Data Berhasil Di Hapus !');
    }

    public function lapewarung()
    {
        return view('dashboard.laporan.laporan-ewarung',[
            'data' => Post::where('ewarung', 'like', "%" .auth()->user()->ewarung. "%")->get(),
        ]);
    }

    public function selesai($id)
    {
        Post::where('id', $id)
            ->update([
                'keterangan' => 'selesai',
            ]);

        $data = Post::where('id', $id)->first();
        
        Keranjang::where("user_id", $data->slug)->delete();

        return redirect('/laporan-ewarung')->with('succes', 'Berhasil Pencairan !');
    }

    public function export()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}
