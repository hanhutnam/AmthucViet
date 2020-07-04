<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Auth;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginview()
    {
        return view('admin.user.login');
    }

    public function signup()
    {
        return view('admin.user.register');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $req)
    {
        $user = new User();
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();
        //$req->Session()->put(['user',$req->username,'email',$req->email]);
        return redirect()->route('user.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $req)
    {
        $arr = ['email'=>$req->username,'password'=>$req->password];
        if(($req->username == "admin@gmail.com") && ($req->password == "admin"))
        {
            $user = User::all();
            return redirect('/admin/listuser');//->route('admin.listuser');
        }
        else if(Auth::attempt($arr,true)){
            return redirect('/admin');
        }
        else 
            return redirect()->back()->with('message','Sai email hoặc mật khẩu!');


        // $user = User::where('email',$req->username)->get();
        // if(Crypt::decrypt($user[0]->password)==$req->password)
        // {
        //     $req->Session()->put('user',$user[0]->name);
        //     return redirect('/');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('page.trangchu');
    }
    
    public function getchange()
    {
        return view('admin.user.changepassword');
    }

    public function postchange(Request $req)
    {
        $user = User::find(Auth::user()->id);
        if(Hash::check($req->password,$user->password))
        {
            if($req->newpassword==$req->renewpassword)
            {
                $user->password = bcrypt($req->newpassword);
                $user->save();
                $thongbao = "Đổi mật khẩu thành công!";
            }
            else   $thongbao = "Mật khẩu nhập lại không trùng khớp";
        }
        else     $thongbao = "Bạn nhập sai mật khẩu hiện tại";
        
        return redirect()->back()->with('message',$thongbao);
    }
}
