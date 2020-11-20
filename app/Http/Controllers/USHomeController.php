<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class USHomeController extends Controller
{
    public function index(){
        // $products = ProductModel::orderBy('price', 'desc')->get();
        $rams = ProductModel::where('status', 1)->where('id_cate_parent', 1)->get();
        $ssds = ProductModel::where('status', 1)->where('id_cate_parent', 2)->get();
        $hhds = ProductModel::where('status', 1)->where('id_cate_parent', 5)->get();
        $usbs = ProductModel::where('status', 1)->where('id_cate_parent', 10)->get();
        $sdcards = ProductModel::where('status', 1)->where('id_cate_parent', 9)->get();
        
        
        return view("clients.home")->with(compact("rams", "ssds", "hhds", "usbs", "sdcards"));
    }

    public function detailsProduct($id){
        $product = ProductModel::where('id', $id)->first();
        return view("clients.details_product")->with(compact("product"));
    }

    public function filterProducts($type, $alias, $id){
        $data = [];
        $category = null;
        $brand = null;
        if($type == "b"){
            $data = ProductModel::where('status', 1)->where('id_brand', '=', $id)->orderBy('price', 'desc')->paginate(9);
            $brand = BrandModel::find($id);

            return view("clients.filter_product")->with(compact("data", "brand"));
        }
        else if($type == "c"){
            $data = ProductModel::where('status', 1)->where('id_cate_parent', '=', $id)->orderBy('price', 'desc')->paginate(9);
            $category = CategoryModel::find($id);

            return view("clients.filter_product")->with(compact("data", "category"));
        }
    }

    public function paymentCart(Request $request){
        $data = [];
        for($i = 1; $i <= 5; $i++){
            if(isset($request['quantity_'.$i]) || isset($request['shipping_'.$i])){
                $product = ["id"=>$request['shipping_'.$i], "quantity"=>$request['quantity_'.$i]];
                array_push($data, $product);
            }
        }
        $products = [];
        foreach($data as $item){
            $products[] = ProductModel::find($item['id']); 
        }

        return view('clients.payment')->with(compact('products', 'data'));
    }

    public function submitPaymentCart(Request $request){
        $products = [];
        $user = [];

        foreach($request['data'] as $item){
            $products[] = ProductModel::find($item['id']); 
        }

        if(Auth::check()){
            $user['id'] = Auth::user()->id;
        }
        else $user['id'] = -1;

        $user['name'] = $request['name'];
        $user['email'] = $request['email'];
        $user['phone'] = $request['phone'];
        $user['address'] = $request['address'];
        $user['note'] = $request['note'];

        return dd($products);
    }
}
