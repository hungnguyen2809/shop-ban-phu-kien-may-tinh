<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ADBrandController extends Controller
{
    public function index(){
        $keystring = '';
        if(isset($_GET['keystring'])){
            $keystring = trim($_GET['keystring']);
        }
        if($keystring == ''){
            $brands = BrandModel::orderBy('status', 'desc')->paginate(5);
        }
        else
        {
            $brands = BrandModel::where('name', 'like', "%$keystring%")->orderBy('status', 'desc')->paginate(5);
        }
        return view('admins.show_brands')->with(compact('brands', 'keystring'));
    }

    public function addBrand(){
        return view('admins.add_brand');
    }

    public function saveAddBrand(Request $request){
        $data = $request->validate([
            'name'=>'required|max:250',
            'alias'=>'',
            'status'=>'',
            'description'=>''
        ],
        [
            'name.required'=>'Vui lòng điền tên thương hiệu',
            'name.max'=>'Tên thương hiệu không quá 250 ký tự',
        ]);

        $brand = new BrandModel();
        $brand['name'] = $data['name'];
        $brand['alias'] = Str::slug($data['name']);
        $brand['description'] = $data['description'];
        $brand['status'] = $data['status'];

        try{
            $brand->save();
            return redirect()->route('addBrand')->with('success', 'Thêm thương hiệu thành công !');
        }catch(Exception $ex){
            return redirect()->route('addBrand')->with('error', 'Thêm thương hiệu thất bại !');
        }
    }

    public function editBrand($id){
        $brand = BrandModel::find($id);
        return view('admins.edit_brand')->with(compact('brand'));
    }

    public function saveEditBrand(Request $request, $id){
        $data = $request->validate([
            'name'=>'required|max:250',
            'alias'=>'',
            'status'=>'',
            'description'=>''
        ],
        [
            'name.required'=>'Vui lòng điền tên thương hiệu',
            'name.max'=>'Tên thương hiệu không quá 250 ký tự',
        ]);

        $brand = BrandModel::find($id);
        $brand['name'] = $data['name'];
        $brand['alias'] = Str::slug($data['name']);
        $brand['description'] = $data['description'];
        $brand['status'] = $data['status'];

        try{
            $brand->save();
            return redirect()->route('editBrand', $id)->with('success', 'Cập nhật thương hiệu thành công !');
        }catch(Exception $ex){
            return redirect()->route('editBrand', $id)->with('error', 'Cập nhật thương hiệu thất bại !');
        }
    }

    public function deleteBrand($id){
        $brand = BrandModel::find($id);
        try{
            $brand->delete();
            return redirect()->route('showBrands')->with('success', 'Xóa dữ liệu thành công !');
        }
        catch(Exception $ex){
            return redirect()->route('showBrands')->with('error', 'Xóa dữ liệu thất bại !');
        }
    }

}
