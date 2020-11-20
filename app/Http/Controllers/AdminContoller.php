<?php

namespace App\Http\Controllers;

use App\Models\OrdersModel;
use App\Models\ProductModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AdminContoller extends Controller
{
    public function index(){
        $products = ProductModel::all();
        $users = User::all();
        $orders = OrdersModel::all();
        return view('admins.dashboard')->with(compact("products", "users", "orders"));
    }

    public function showUsers(){
        $users = User::orderBy('status', 'desc')->paginate(5);
        return view('admins.show_users')->with(compact("users"));
    }

    public function addUser(){
        return view("admins.add_user");
    }

    public function saveAddUser(Request $request){
        $data = $request->validate([
            'name' => 'required|max:100|min:5',
            'email' => 'required|max:100|unique:users,email|email',
            'password' => 'required|max:30|min:6',
            'repassword' => 'required|same:password',
            'phone' => 'max:20',
            'address' => 'max:250',
            'permission' => '',
            'status' => ''
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

            'phone.max' => 'Độ dài tối đa số điện thoại là 20 ký tự',

            'address.max' => 'Địa chỉ tối đa 259 ký tự',
        ]);

        $user = new User();
        $user['name'] = $data['name'];
        $user['email'] = $data['email'];
        $user['password'] = bcrypt($data['password']);
        $user['phone'] = $data['phone'];
        $user['address'] = $data['address'];
        $user['permission'] = $data['permission'];
        $user['status'] = $data['status'];

        try{
            $user->save();
            return redirect()->route('addUser')->with('success', 'Tạo mới tài khoản thành công !');
        }catch(Exception $ex){
            return redirect()->route('addUser')->with('error', 'Tạo mới tài khoản thất bại !');
        }
    }

    public function editUser($id){
        $user = User::find($id);
        return view('admins.edit_user')->with(compact("user"));
    }

    public function saveEditUser(Request $request, $id){
        $data = $request->validate([
            'name' => 'required|max:100|min:5',
            'phone' => 'max:20',
            'address' => 'max:250',
            'permission' => '',
            'status' => ''
        ],
        [
            'name.required' => "Bạn chưa điền tên hiển thị !",
            'name.max' => "Tên hiển thị tối đa 100 ký tự !",
            'name.min' => "Tên hiển thị tối thiểu 5 ký tự !",
            'phone.max' => 'Độ dài tối đa số điện thoại là 20 ký tự',
            'address.max' => 'Địa chỉ tối đa 259 ký tự',
        ]);

        $user = User::find($id);
        $user['name'] = $data['name'];
        $user['phone'] = $data['phone'];
        $user['address'] = $data['address'];
        $user['permission'] = $data['permission'];
        $user['status'] = $data['status'];
        
        $emailPost = request('email');
        if($emailPost != $user['email']){
            $emailValidate = $request->validate([
                'email' => 'max:100|unique:users,email|email',
            ],[
                'email.email' => 'Bạn chưa nhập đúng định dạng email !',
                'email.max' => 'Địa chỉ email tối đa 100 ký tự !',
                'email.unique' => 'Địa chỉ email đã tồn tại !',
            ]);
            $user['email'] = $emailValidate['email'];
        }

        $passwordPost = request('password');
        $repasswordPost = request('repassword');
        if($passwordPost && $repasswordPost){
            $passwordValidate = $request->validate([
                'password' => 'max:30|min:6',
                'repassword' => 'same:password',
            ],[
                'password.max' => 'Mật khẩu tối đa 30 ký tự !',
                'password.min' => 'Mật khẩu tối thiểu 6 ký tự !',
                'repassword.same' => 'Mật khẩu nhập lại không đúng !',
            ]);
            $user['password'] = bcrypt($passwordValidate['password']);
        }
    
        try{
            $user->save();
            return redirect()->route('editUser', $id)->with('success', 'Cập nhật tài khoản thành công !');
        }catch(Exception $ex){
            return redirect()->route('editUser', $id)->with('error', 'Cập nhật tài khoản thất bại !');
        }
    }

    public function deleteUser($id){
        $user = User::find($id);
        try{
            $user->delete();
            return redirect()->route('showUsers')->with('success', 'Xóa dữ liệu thành công !');
        }
        catch(Exception $ex){
            return redirect()->route('showUsers')->with('error', 'Xóa dữ liệu thất bại !');
        }
    }
}
