<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Friends;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiFriendsController extends Controller
{
    public function index(Request $request)
    {
        $data = User::with('friend')->find(auth()->user()->id)['friend'];
        return response()->json([
            'message' =>' success',
            'data' => $data,
        ]);

    }

    public function store(Request $request)
    {
        try {
            $validasi = $request->validate([
                'firstname' => 'required',
                'lastname' => '',
                'phone' => '',
            ]);

            $friend = Friends::create($validasi);
            $friend->save();

            $user = User::find(auth()->user()->id);
            $user->friend()->attach($friend->id);

            return response()->json([
                'message' => 'success',
                'data' => compact('friend'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function edit($id)
    {
        $data = User::with('friend')->find(auth()->user()->id)->friend()->where('friends.id','=',$id)->get();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $validasi = $request->validate([
                'firstname' => '',
                'lastname' => '',
                'phone' => '',
            ]);

            $friend = Friends::find($id);
            $friend->update($validasi);

            $user = User::find(auth()->user()->id);
            $user->friend()->sync($id);

            return response()->json([
                'message' => 'success',
                'data' => compact('friend'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $user_id = Friends::with('user')->find($id)->user()->where('users.id', '=', auth()->user()->id)->first()->id;
            $friend = Friends::find($id);

            if($user_id == auth()->user()->id){
                $friend->user()->detach($id);
                $friend->delete();
            }

            return response()->json([
                'message' => 'success',
                'data' => $friend,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
