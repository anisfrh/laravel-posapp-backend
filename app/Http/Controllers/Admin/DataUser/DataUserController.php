<?php

namespace App\Http\Controllers\Admin\DataUser;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DataUserController extends Controller
{
    public function dataUser(){
        $user = User::all();
        return view('Admin.DataUser.indexDataUser', compact('user'));
    }

    public function dataUserForm(){
        return view('Admin.DataUser.createDataUser');
    }

    public function dataUserCreate(Request $request){
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => 3,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('index.dataUser')->with('Create',"Data User $request->name berhasil ditambahkan");
    }

    public function dataUserDelete(Request $request){
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->back()->with('Delete',"Data User $request->name berhasil dihapus");
    }

    public function dataUserSearch(Request $request){
        if($request->has('search')){
            $user = User::where('name','LIKE','%'.$request->search.'%')->get();
        }else{
            $user = User::all();
        }

        return view('Admin.DataUser.indexDataUser',compact('user'));
    }
}