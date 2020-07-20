<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Session;
use Mail;
use App\Mail\ResetpasswordMail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function loginview()
    {
        return view('admin.user.login');
    }

    public function signup()
    {
        return view('admin.user.register');
    }
 
    public function register(Request $req)
    {
        $this->validate($req,
            [
                'username'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                're_password'=>'required|same:password'
            ],
            [
                'username.required'=>'Vui lòng nhập Họ và tên.',
                'email.required'=>'Vui lòng nhập email.',
                'email.email'=>'Không đúng định dạng email.',
                'email.unique'=>'Email đã có người sử dụng.',
                'password.required'=>'Vui lòng nhập mật khẩu.',
                're_password.required'=>'Vui lòng nhập mật khẩu.',
                're_password.same'=>'Mật khẩu không giống nhau.',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự.'
            ]);
        $user = new User();
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();
        //$req->Session()->put(['user',$req->username,'email',$req->email]);
        return redirect()->route('user.login');
    }


    public function login(Request $req)
    {
        $arr = ['email'=>$req->username,'password'=>$req->password];
        if(($req->username == "admin@gmail.com") && ($req->password == "admin"))
        {
            $user = User::all();
            return redirect('/admin/listuser');
        }

        if(Auth::attempt($arr,true)){

            return redirect('/admin');
        }
         
        return redirect()->back()->with('message','Sai email hoặc mật khẩu!');

    }


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
                return redirect()->back()->with('success',$thongbao);
            }
            else   $thongbao = "Mật khẩu nhập lại không trùng khớp";
        }
        else     $thongbao = "Bạn nhập sai mật khẩu hiện tại";
        
        return redirect()->back()->with('message',$thongbao);
    }

    public function getsendmail(){

        return view('admin.user.forgetpassword');
    }

    public function postsendmail(Request $request)
    {
        $result = User::where('email', $request->email)->first();
        if($result)
        {
            $token = $result->remember_token;
            $mail = $result->email;
            $link = url('admin/changepassword')."/".$token;
            //gửi mail
            Mail::to($mail)->send(new ResetpasswordMail($mail,$link));
            return redirect()->back()->with('success','Đã gửi thông tin về mail của bạn.');
        }
        
        return redirect()->back()->with('error','Email không có trong hệ thống, vui lòng kiểm tra lại.');
    }

    public function getforgetpassword($token){
        return view('admin.user.resetpass',['token'=>$token]);
    }

    public function postpassword($token, Request $request)
    {
        $this->validate($request,
        [
            'newpassword'=>'required|min:6|max:20',
            'renewpassword'=>'required|same:newpassword'
        ],
        [
            'newpassword.required'=>'Vui lòng nhập mật khẩu.',
            'renewpassword.required'=>'Vui lòng nhập mật khẩu.',
            'renewpassword.same'=>'Mật khẩu không giống nhau.',
            'newpassword.min'=>'Mật khẩu ít nhất 6 kí tự.'
        ]);
        $user = User::Where('remember_token',$token)->first();
        $user->password = bcrypt($request->newpassword);
        $user->save();

    	return redirect()->route('user.login');
    }
}
