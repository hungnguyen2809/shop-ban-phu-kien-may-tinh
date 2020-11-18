<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
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
}
