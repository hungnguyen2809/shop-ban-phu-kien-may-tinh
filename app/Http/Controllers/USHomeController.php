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
        $products = ProductModel::all();
        $rams = $this->getProductForCategory(1, $products);
        $ssds = $this->getProductForCategory(2, $products);
        $hhds = $this->getProductForCategory(5, $products);
        $usbs = $this->getProductForCategory(10, $products);
        $sdcards = $this->getProductForCategory(9, $products);
        
        
        return view("clients.home")->with(compact("rams", "ssds", "hhds", "usbs", "sdcards"));
    }

    private function getProductForCategory($idCategory, $products){
        $idFinds = CategoryModel::where('status', 1)->where('id_parent', '=', $idCategory)->select('id')->get();
        $productFinds = [];
        foreach($products as $product){
            foreach($idFinds as $idfind){
                if($product->id_category == $idfind->id){
                    array_push($productFinds, $product);
                }
            }
        }
        return $productFinds;
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
            $data = ProductModel::where('status', 1)->where('id_brand', '=', $id)->orderBy('price', 'desc')->get();
            $brand = BrandModel::find($id);

            return view("clients.filter_product")->with(compact("data", "brand"));
        }
        else if($type == "c"){
            $products = ProductModel::where('status', 1)->orderBy('price', 'desc')->get();
            $data = $this->getProductForCategory($id, $products);
            $category = CategoryModel::find($id);

            return view("clients.filter_product")->with(compact("data", "category"));
        }
    }
}
