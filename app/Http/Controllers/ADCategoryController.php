<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ADCategoryController extends Controller
{
    public function index(){
        $keystring = '';
        if(isset($_GET['keystring'])){
            $keystring = trim($_GET['keystring']);
        }

        $categoryParents = CategoryModel::where('id_parent', '=', 0)->get();
        
        if($keystring == ''){
            $categorys = CategoryModel::where('id_parent', '>', 0)->orderBy('status', 'desc')->paginate(5);
        }
        else
        {
            $categorys = CategoryModel::where('id_parent', '>', 0)
                        ->where('name', 'like', "%$keystring%")
                        ->orderBy('status', 'desc')
                        ->paginate(5);
        }
        return view('admins.show_categorys')->with(compact('categorys', 'categoryParents', 'keystring'));
    }

    public function addCategory(){
        $categoryParents = CategoryModel::where('id_parent', '=', 0)->where('status', 1)->get();
        return view('admins.add_category')->with(compact('categoryParents'));
    }

    public function saveAddCategory(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|max:250',
            'status'=>'',
            'alias'=>'',
            'id_parent'=>'',
            'description'=>''
        ],
        [
            'name.required'=>'Vui lòng điền tên danh mục',
            'name.max'=>'Tên sản phẩm tối đa 250 ký tự',
        ]);

        $cate = new CategoryModel();
        $cate['name'] = $data['name'];
        $cate['alias'] = Str::slug($data['name']);
        $cate['id_parent'] = $data['id_parent'];
        $cate['description'] = $data['description'];
        $cate['status'] = $data['status'];

        try{
            $cate->save();
            return redirect()->route('addCategory')->with('success', 'Thêm danh mục thành công !');
        }catch(Exception $ex){
            return redirect()->route('addCategory')->with('error', 'Thêm danh mục thất bại !');
        }
    }

    public function editCategory($id)
    {
        $categoryParents = CategoryModel::where('id_parent', '=', 0)->where('status', 1)->get();
        $category = CategoryModel::find($id);
        return view('admins.edit_category')->with(compact('category', 'categoryParents'));
    }

    public function saveEditCategory(Request $request, $id){
        $data = $request->validate([
            'name'=>'required|max:250',
            'status'=>'',
            'alias'=>'',
            'id_parent'=>'',
            'description'=>''
        ],
        [
            'name.required'=>'Vui lòng điền tên danh mục',
            'name.max'=>'Tên sản phẩm tối đa 250 ký tự',
        ]);

        $cate = CategoryModel::find($id);
        $cate['name'] = $data['name'];
        $cate['alias'] = Str::slug($data['name']);
        $cate['id_parent'] = $data['id_parent'];
        $cate['description'] = $data['description'];
        $cate['status'] = $data['status'];

        try{
            $cate->save();
            return redirect()->route('editCategory', $id)->with('success', 'Cập nhật danh mục thành công !');
        }catch(Exception $ex){
            return redirect()->route('editCategory', $id)->with('error', 'Cập nhật danh mục thất bại !');
        }
    }

    public function deleteCategory($id){
        $cate = CategoryModel::find($id);
        try{
            $cate->delete();
            return redirect()->route('showCategorys')->with('success', 'Xóa dữ liệu thành công !');
        }
        catch(Exception $ex){
            return redirect()->route('showCategorys')->with('error', 'Xóa dữ liệu thất bại !');
        }
    }

    public function showCategoryParents(){
        $keystring = '';
        if(isset($_GET['keystring'])){
            $keystring = trim($_GET['keystring']);
        }
        if($keystring == ''){
            $categoryParents = CategoryModel::where('id_parent', '=', 0)
                            ->orderBy('status', 'desc')->paginate(5);
        }
        else
        {
            $categoryParents = CategoryModel::where('id_parent', '=', 0)
                            ->where('name', 'like', "%$keystring%")
                            ->orderBy('status', 'desc')->paginate(5);
        }
        return view("admins.show_categorys_parent")->with(compact("categoryParents", "keystring"));
    }

    public function addCategoryParent(){
        return view("admins.add_category_parent");
    }

    public function saveAddCategoryParent(Request $request){
        $data = $request->validate([
            'name'=>'required|max:250',
            'status'=>'',
            'description'=>''
        ],
        [
            'name.required'=>'Vui lòng điền tên danh mục',
            'name.max'=>'Tên sản phẩm tối đa 250 ký tự',
        ]);

        $cate = new CategoryModel();
        $cate['name'] = $data['name'];
        $cate['alias'] = Str::slug($data['name']);
        $cate['id_parent'] = 0;
        $cate['description'] = $data['description'];
        $cate['status'] = $data['status'];

        try{
            $cate->save();
            return redirect()->route('addCategoryParent')->with('success', 'Thêm danh mục thành công !');
        }catch(Exception $ex){
            return redirect()->route('addCategoryParent')->with('error', 'Thêm danh mục thất bại !');
        }
    }

    public function editCategoryParent($id){
        $category = CategoryModel::find($id);
        return view('admins.edit_category_parent')->with(compact('category'));
    }

    public function saveEditCategoryParent(Request $request, $id){
        $data = $request->validate([
            'name'=>'required|max:250',
            'status'=>'',
            'description'=>''
        ],
        [
            'name.required'=>'Vui lòng điền tên danh mục',
            'name.max'=>'Tên sản phẩm tối đa 250 ký tự',
        ]);

        $cate = CategoryModel::find($id);
        $cate['name'] = $data['name'];
        $cate['alias'] = Str::slug($data['name']);
        $cate['description'] = $data['description'];
        $cate['status'] = $data['status'];

        try{
            $cate->save();
            return redirect()->route('editCategoryParent', $id)->with('success', 'Cập nhật danh mục thành công !');
        }catch(Exception $ex){
            return redirect()->route('editCategoryParent', $id)->with('error', 'Cập nhật danh mục thất bại !');
        }
    }

    public function deleteCategoryParent($id){
        $cate = CategoryModel::find($id);
        try{
            $cate->delete();
            return redirect()->route('showCategoryParents')->with('success', 'Xóa dữ liệu thành công !');
        }
        catch(Exception $ex){
            return redirect()->route('showCategoryParents')->with('error', 'Xóa dữ liệu thất bại !');
        }
    }

}
