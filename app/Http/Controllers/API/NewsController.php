<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $data = News::getNews();
        return response()->json($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $validasi = $request->validate([
                'owner_id' => 'required|numeric|exists:users,id',
                'title' => 'required',
                'deskripsi' => 'required',
                'photo' => 'required|file|mimes:png,jpg'
            ]);

            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('upload/news', $fileName);
            $validasi['photo']=$path;

            $response = News::create($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = News::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $validasi = $request->validate([
                'owner_id' => 'required|numeric|exists:users,id',
                'title' => 'required',
                'deskripsi' => 'required',
                'photo' => ''
            ]);

            if($request->file('photo')){
                $fileName = time().$request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('upload/news', $fileName);
                $validasi['photo']=$path;
            }

            $response = News::find($id);
            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'error' => $e->getMessage(),
            ]);
        }
    }

    function owner(){
        $data = User::all();
        return response()->json($data);
    }

    public function destroy(Request $request, $id)
    {
        try {
            $news = News::find($id);
            $news->delete();

            return redirect('admin');
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'errors'=>$e->getMessage()
            ]);
        }
    }
}
