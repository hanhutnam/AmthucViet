<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
 
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.user.list',['user'=>$user]);
    }

 
    public function edit($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.user.update',['user'=>$user]);
    }


    public function update(Request $req, $id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->save();
        return redirect()->route('user.index')->with('success', 'Cập nhật thành công!');
    }

}
