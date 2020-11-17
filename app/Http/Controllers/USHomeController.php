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
        $products = ProductModel::orderBy('price', 'asc')->get();
        $rams = $this->getProductForCategory(1, $products);
        
        return view("clients.home")->with(compact("rams"));
    }

    private function getProductForCategory($idCategory, $products){
        $idFinds = CategoryModel::where('id_parent', '=', $idCategory)->select('id')->get();
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
}
