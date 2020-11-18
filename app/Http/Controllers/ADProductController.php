<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ADProductController extends Controller
{
    public function index(){
		$categorys = CategoryModel::all();
		$keystring = '';
        if(isset($_GET['keystring'])){
            $keystring = trim($_GET['keystring']);
        }
        if($keystring == ''){
            $products = ProductModel::orderBy('status', 'desc')->paginate(5);
        }
        else
        {
			$products = ProductModel::where('name', 'like', "%$keystring%")
									->orderBy('status', 'desc')
									->paginate(5);
        }
		return view('admins.show_products')->with(compact('products', 'categorys', 'keystring'));
	}
	
	public function addProduct(){
		$brands = BrandModel::all();
		$categorys = CategoryModel::all();
		return view('admins.add_product')->with(compact('brands', 'categorys'));
	}

	public function saveAddProduct(Request $request){
		$data = $request->validate([
			'name' => 'required',
			'alias' => '',
			'images' => 'required',
			'quantity' => 'required',
			'price' => 'required',
			'id_brand' => '',
			'id_category' => '',
			'description' => '',
			'status' => '',
		],
		[
			'name.required' => 'Bạn chưa điền tên cho sản phẩm',
			'images.required' => 'Bạn chưa chọn ảnh cho sản phẩm',
			'quantity.required' => 'Bạn chưa điền số lượng cho sản phẩm',
			'price.required' => 'Bạn chưa điền giá cho sản phẩm',
		]);

		$product = new ProductModel();
		$product['name'] = $data['name'];
		$product['alias'] = Str::slug($data['name']);
		$product['quantity'] = $data['quantity'];
		$product['price'] = $data['price'];
		$product['id_brand'] = $data['id_brand'];
		$product['id_category'] = $data['id_category'];
		$id_parent = CategoryModel::find($data['id_category']);
		$product['id_cate_parent'] = $id_parent->id_parent;
		$product['description'] = $data['description'];
		$product['status'] = $data['status'];
		$product["images"] = $data["images"]->store("images", "public");

		try{
			$product->save();
			return redirect()->route('addProduct')->with('success', 'Thêm sản phẩm thành công !');
		}catch(Exception $ex){
			return redirect()->route('addProduct')->with('error', 'Thêm sản phẩm thất bại !');
		}
		
		// echo('<pre>');
		// print_r($data);
		// echo('</pre>');
	}

	public function editProduct($id){
		$brands = BrandModel::all();
		$categorys = CategoryModel::all();
		$product = ProductModel::find($id);
		return view("admins.edit_product")->with(compact("product", "brands", "categorys"));
	}

	public function saveEditProduct(Request $request, $id){
		$data = $request->validate([
			'name' => 'required',
			'alias' => '',
			'images' => '',
			'quantity' => 'required',
			'price' => 'required',
			'id_brand' => '',
			'id_category' => '',
			'description' => '',
			'status' => '',
		],
		[
			'name.required' => 'Bạn chưa điền tên cho sản phẩm',
			'quantity.required' => 'Bạn chưa điền số lượng cho sản phẩm',
			'price.required' => 'Bạn chưa điền giá cho sản phẩm',
		]);

		$product = ProductModel::find($id);		
		$images = request('images');

		if($images){
			$destinationPath = 'storage/'.$product->images;
			if(file_exists($destinationPath)){
				unlink($destinationPath);
			}

			$product['name'] = $data['name'];
			$product['alias'] = Str::slug($data['name']);
			$product['quantity'] = $data['quantity'];
			$product['price'] = $data['price'];
			$product['id_brand'] = $data['id_brand'];
			$product['id_category'] = $data['id_category'];
			$id_parent = CategoryModel::find($data['id_category']);
			$product['id_cate_parent'] = $id_parent->id_parent;
			$product['description'] = $data['description'];
			$product['status'] = $data['status'];

			$imagePath = request('images')->store("images", "public");
			$product["images"] = $imagePath;
		}
		else
		{
			$product['name'] = $data['name'];
			$product['alias'] = Str::slug($data['name']);
			$product['quantity'] = $data['quantity'];
			$product['price'] = $data['price'];
			$product['id_brand'] = $data['id_brand'];
			$product['id_category'] = $data['id_category'];
			$id_parent = CategoryModel::find($data['id_category']);
			$product['id_cate_parent'] = $id_parent->id_parent;
			$product['description'] = $data['description'];
			$product['status'] = $data['status'];
		}

		try{
			$product->save();
			return redirect()->route('editProduct', $id)->with('success', 'Cập nhật sản phẩm thành công !');
		}catch(Exception $ex){
			return redirect()->route('editProduct', $id)->with('error', 'Cập nhật sản phẩm thất bại !');
		}
	}

	public function deleteProduct($id){
		$product = ProductModel::find($id);

		try{
				$destinationPath = 'storage/'.$product->images;
				if(file_exists($destinationPath)){
						unlink($destinationPath);
				}
				$product->delete();
				return redirect()->route("showProducts")->with("success", "Xóa dữ liệu thành công !");
		}
		catch(Exception $ex){
				return redirect()->route("showProducts")->with("error", "Xóa dữ liệu thất bại !");
		}
	}
}
