<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginUser(){
        return view("layouts.login");
    }

    public function submitLoginUser(Request $request){
        $data = $request->validate([
            'email' => 'required|max:100|email',
            'password' => 'required|max:30|min:6',
        ],[
            'email.required' => 'Bạn chưa điền địa chỉ email !',
            'email.email' => 'Bạn chưa nhập đúng định dạng email !',
            'email.max' => 'Địa chỉ email tối đa 100 ký tự !',

            'password.required' => 'Bạn chưa điền mật khẩu !',
            'password.max' => 'Mật khẩu tối đa 30 ký tự !',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự !',
        ]);
        
        $user = ['email' => $data['email'], 'password' => $data['password']];

        if(Auth::attempt($user)){
            $user = Auth::user();
            if($user->status == 1){
                if($user->permission == 1){
                    return redirect()->route('quanTri');
                }
                else if($user->permission == 0){
                    return view('layouts.client');
                }
            }
            else{
                Auth::logout();
                return redirect()->route('loginUser')->with('error', 'Tài khoản của bạn hiện không khả dụng ?');
            }
        }
        else{
            return redirect()->route('loginUser')->with('error', 'Đăng nhập thất bại !');
        }
    }

    public function registerUser(){
        return view("layouts.register");
    }

    public function submitRegisterUser(Request $request){
        $data = $request->validate([
            'name' => 'required|max:100|min:5',
            'email' => 'required|max:100|unique:users,email|email',
            'password' => 'required|max:30|min:6',
            'repassword' => 'required|same:password'
        ],
        [
            'name.required' => "Bạn chưa điền tên hiển thị !",
            'name.max' => "Tên hiển thị tối đa 100 ký tự !",
            'name.min' => "Tên hiển thị tối thiểu 5 ký tự !",

            'email.required' => 'Bạn chưa điền địa chỉ email !',
            'email.email' => 'Bạn chưa nhập đúng định dạng email !',
            'email.max' => 'Địa chỉ email tối đa 100 ký tự !',
            'email.unique' => 'Địa chỉ email đã tồn tại trong hệ thống !',

            'password.required' => 'Bạn chưa điền mật khẩu !',
            'password.max' => 'Mật khẩu tối đa 30 ký tự !',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự !',

            'repassword.required' => 'Bạn chưa điền nhập lại mật khẩu !',
            'repassword.same' => 'Mật khẩu nhập lại không đúng !',
        ]);

        $user = new User();
        $user['name'] = $data['name'];
        $user['email'] = $data['email'];
        $user['password'] = bcrypt($data['password']);

        try{
            $user->save();
            return redirect()->route('registerUser')->with('success', 'Tạo tài khoản thành công');
        }
        catch(Exception $ex){
            return redirect()->route('registerUser')->with('error', 'Tạo tài khoản thất bại');
        }
    }

    public function logoutUser(){
        Auth::logout();
        return redirect()->route('loginUser');
    }
}
