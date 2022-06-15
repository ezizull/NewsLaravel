<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin.dashboard');
    }

    function form(){
        return view('admin.pages.form');
    }

    function tabel(){
        $data = User::with('news')->get();
        // dd($data);
        return view('admin.pages.tables', compact('data'));
    }

    public function edit($id)
    {
        $data = News::find($id);
        return view('admin.pages.form', compact('data'));
    }

    public function store(Request $request)
    {
        // return $request;
        // return redirect('tabel');
        // dd($path);

        try {
            $request->request->add(['owner_id' => auth()->user()->id]);

            $validasi = $request->validate([
                'owner_id' => 'required|numeric|exists:users,id',
                'title' => 'required',
                'deskripsi' => 'required',
                'photo' => 'required|image|mimes:png,jpg'
            ]);

            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('upload/news', $fileName);
            $validasi['photo'] = $path;
            // dd($path);

            News::create($validasi);
            return redirect('tabel');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('upload/news', $fileName);
            // dd($path);

            $validasi = $request->validate([
                'title' => 'required',
                'deskripsi' => 'required',
                'photo' => ''
            ]);

            $validasi['photo'] = $path;

            $response = News::find($id);

            $photo = str_replace('/','\\',$response->photo);

            if(file_exists(public_path("$photo"))){
                unlink(public_path("$photo"));
            }

            $response->update($validasi);
            return redirect('tabel');
        } catch (\Exception $e) {
            return $e;
        }
    }

    function destroy($id)
    {
        try {
            $news = News::find($id);
            $photo = str_replace('/','\\',$news->photo);

            if(file_exists(public_path("$photo"))){
                unlink(public_path("$photo"));
            }

            $news->delete();
            return redirect('tabel');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
