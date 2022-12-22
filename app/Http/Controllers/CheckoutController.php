<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
session_start();
class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
           return Redirect::to('admin.dashboard');
        }else{
        return Redirect::to('admin')->send();
        }
    }
    public function login_checkout(){
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function add_user(Request $request){

        $data_user = array();
        $data_user['username'] = $request->email;
        $data_user['password'] = md5($request->password);
        $insert_user = DB::table('dbo_user')->insertGetId($data_user);
       
        $data = array();
        $data['full_name'] = $request->full_name;
        $data['birth_day'] = $request->birth_day;
        $data['gender'] = $request->gender;
        $data['address'] = $request->address;
        $data['phone_number'] = $request->phone_number;
        $data['email'] = $request->email;
        $data['user_id'] = $insert_user;

        $profile_id = DB::table('dbo_profile')->insertGetId($data);
        Session::put('profile_id',$profile_id);
        Session::put('full_name',$request->full_name);
        Session::put('user_id',$insert_user);
        return Redirect('/show-checkout');
    }

    public function checkout(){
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();
        $transaction = DB::table('dbo_transaction')->get();
        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('transaction',$transaction);
    }
    public function save_checkout(Request $request){
        //insert dbo_order
        $data = array();
        $data['created_datetime'] = Carbon::now();
        $data['last_modified_datetime'] = Carbon::now();
        $data['username'] = $request->username;
        $data['address'] = $request->address;
        $data['phone_number'] = $request->phone_number;
        $data['email'] = $request->email;
        $data['status'] = '1';
        $data['total_money'] = Cart::total(0, ',', '');
        $data['user_id']=Session::get('user_id');
        $insert_order = DB::table('dbo_order')->insertGetId($data);

        //insert order_transaction
        $data_tran = array();
        $data_tran['id'] = auth()->id();
        $data_tran['order_id'] = $insert_order;
        $data_tran['transaction_id'] = $request->transaction;
        $insert_order_tran=DB::table('dbo_order_transaction')->insert($data_tran);

        //insert order_detail
        $content = Cart::content();
        foreach($content as $key){
            $data_detail = array();
            $data_detail['price'] = $key->price;
            $data_detail['quantity'] = $key->qty;
            $data_detail['product_id'] = $key->id;
            $data_detail['order_id'] = $insert_order;
            DB::table('dbo_order_detail')->insert($data_detail);
        }
        Session::put('insert_order',$insert_order);
        return Redirect('/payment');
    }
    public function payment(){
        Cart::destroy();
        $user_id = Session::get('user_id');
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();
        $order = DB::table('dbo_order')->where('user_id',$user_id)->orderby('id','desc')->get();
        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product)->with('order',$order);

    }
    public function order_detail($id){
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();
        $order_detail = DB::table('dbo_order_detail')
        ->join('dbo_product','dbo_product.id','dbo_order_detail.product_id')
        ->where('order_id',$id)->get();
        return view('pages.checkout.order_detail')->with('category',$cate_product)->with('brand',$brand_product)->with('order_detail',$order_detail);

    }
    public function login_user(Request $request){
        $username = $request->username;
        $password = md5($request->password);

        $result = DB::table('dbo_user')->where('username',$username)
        ->where('password',$password)->first();
        if($result){
            Session::put('user_id',$result->id);
            return Redirect::to('/home');
        }
        else{
            Session::put('message','Mật khẩu hoặc E-mail không chính xác. Mời nhập lại!');
            return Redirect::to('/login-checkout');
        }
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }
    //admin
    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('dbo_order')->orderby('dbo_order.id','desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order',$manager_order);
    }
    public function edit_order($id){
        $this->AuthLogin();
        $all_order = DB::table('dbo_order_detail')
        ->join('dbo_product','dbo_order_detail.product_id','=','dbo_product.id')
        ->where('dbo_order_detail.order_id',$id)->get();
        $order =  DB::table('dbo_order')->where('dbo_order.id',$id)->get();
        // $manager_product = view('admin.edit_order')->with('all_order',$all_order);
        // return view('admin_layout')->with('admin.edit_order',$manager_product);
        return view('admin.edit_order')->with('all_order',$all_order)->with('order',$order);
    }
    public function update_status(Request $request,$id){
        $this->AuthLogin();
        $data = array();
        $data['status'] = $request->order_status;
        DB::table('dbo_order')->where('id',$id)->update($data);
        return Redirect::to('manage-order');
    }
}
