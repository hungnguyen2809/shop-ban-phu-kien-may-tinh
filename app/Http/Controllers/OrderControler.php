<?php

namespace App\Http\Controllers;

use App\Models\OrderDetailsModel;
use App\Models\OrdersModel;
use App\Models\ProductModel;


class OrderControler extends Controller
{
    public function index(){
        $keystring = '';
        if(isset($_GET['keystring'])){
            $keystring = trim($_GET['keystring']);
        }
        if($keystring == ''){
            $orders = OrdersModel::orderBy('created_at', 'desc')->paginate(5);
        }
        else{
            $orders = OrdersModel::where('name', 'like', "%$keystring%")
                                ->orWhere('email', 'like', "%$keystring%")
                                ->orWhere('phone', 'like', "%$keystring%")
                                ->orWhere('address', 'like', "%$keystring%")
                                ->orderBy('created_at', 'desc')
                                ->paginate(5);
        }
        return view("admins.show_orders")->with(compact("orders"));
    }

    public function showOrderDetails($id){
        $orderdetails = OrderDetailsModel::where('id_order', $id)->get();
        $orders = OrdersModel::find($id);
        $products = ProductModel::all();
        return view("admins.show_order_details")->with(compact("orderdetails", "products", "orders"));
    }
}
