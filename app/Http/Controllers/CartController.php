<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request){
        $productID = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('dbo_product')->where('id',$productID)->first();
        //Cart::destroy();
        $data['id'] = $product_info->id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->name;
        $data['price'] = $product_info->price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->main_image;
        Cart::add($data);
        Cart::setGlobalTax(10);
        Cart::setGlobalDiscount(0);
        return Redirect::to('/show-cart');
        
    }
    public function show_cart(){
        
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)
        ->with('brand',$brand_product);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId, 0); 
        return Redirect::to('/show-cart');
    }
    public function update_cart(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}
