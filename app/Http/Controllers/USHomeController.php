<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\OrderDetailsModel;
use App\Models\OrdersModel;
use App\Models\ProductModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function searchName(){
        $key = "";
        if(isset($_GET['key'])){
            $key = $_GET['key'];
            $products = ProductModel::where('status', 1)->where('name', 'like', "%$key%")->paginate(10);
            return view("clients.search")->with(compact("products", "key"));
        }
        if($key == ""){
            return redirect()->route("home");
        }
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
        $order = new OrdersModel();

        foreach($request['data'] as $item){
            $products[] = ProductModel::find($item['id']); 
        }

        if(Auth::check()){
            $order['id_user'] = Auth::user()->id;
        }
        else $order['id_user'] = -1;

        $order['name'] = $request['name'];
        $order['email'] = $request['email'];
        $order['phone'] = $request['phone'];
        $order['address'] = $request['address'];
        $order['note'] = $request['note'];
        $order['status'] = 1;

        try{
            $order->save();
            foreach($products as $product){
                foreach($request['data'] as $item){
                    if($product['id'] == $item['id']){
                        $orderDetails = new OrderDetailsModel();

                        $orderDetails['id_order'] =  $order->id;
                        $orderDetails['id_product'] =  $product->id;
                        $orderDetails['quantity'] =  $item['quantity'];
                        $orderDetails['price'] =  $product->price;
                        $orderDetails['service_code'] =  "ABC01";
                        $orderDetails['sale'] =  0;
                        $orderDetails['warranty_preiod'] =  24;
                        
                        $orderDetails->save();
                    }
                }
            }
            return redirect()->route('completePaymentCart')->with("success", "Đặt hàng thành công !");
        }
        catch(Exception $ex){
            return redirect()->route('completePaymentCart')->with("error", "Đặt hàng thất bại ! Vui lòng thử lại sau !");
        }
    }

    public function completePaymentCart(){
        return view("clients.complete_payment");
    }

    public function aboutUS(){
        return view("layouts.about");
    }
}
