<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class InputController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
           return Redirect::to('admin.dashboard');
        }else{
        return Redirect::to('admin')->send();
        }
    }
    public function add_input(){
        $this->AuthLogin();
        $warehouse = DB::table('dbo_warehouse')->get();
        $product = DB::table('dbo_product')->get();
        $supplier = DB::table('dbo_supplier')->get();
        
        return view('admin.add_input')->with('warehouse',$warehouse)->with('product',$product)->with('supplier',$supplier);
    }
    public function save_input(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['transporter'] = $request->transporter;
        $data['phone_transporter'] = $request->phone_transporter;
        $data['warehouse_id'] = $request->warehouse;
        $data['status'] = $request->status;
        $data['import_date'] = Carbon::now();
        $data['user_id'] = Session::get('id');

        $input_id = DB::table('dbo_input')->insertGetId($data);
        Session::put('input_id',$input_id);
        Session::put('message','Tạo phiếu nhập hàng thành công');
        return Redirect::to('add-input');
    }
    public function save_input_detail(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_id'] = $request->product;
        $data['supplier_id'] = $request->supplier;
        $data['input_id'] = Session::get('input_id');
        $data['import_price'] = $request->import_price;
        $data['actual_amount'] = $request->qty;
        $data['theoretical_amount'] = $request->qty;
        $data['expiry_date'] = $request->expiry_date;
        $data['status'] = '1';

        DB::table('dbo_input_detail')->insertGetId($data);
        Session::put('message','Thêm sản phẩm vào phiếu nhập hàng thành công');
        return Redirect::to('add-input');
    }
    public function all_input(){
        $this->AuthLogin();
        $all_input = DB::table('dbo_input')
        ->join('dbo_user','dbo_user.id','=','dbo_input.user_id')
        ->join('dbo_profile','dbo_user.id','=','dbo_profile.user_id')
        ->join('dbo_warehouse','dbo_warehouse.id','=','dbo_input.warehouse_id')
        ->select('dbo_input.*','full_name','dbo_warehouse.address as warehouse')
        ->orderby('dbo_input.id','desc')->get();
        $manager_product = view('admin.all_input')->with('all_input',$all_input);
        return view('admin_layout')->with('admin.all_input',$manager_product);
    }
    public function edit_input($id){
        $this->AuthLogin();
        $all_input = DB::table('dbo_input_detail')
        ->join('dbo_product','dbo_input_detail.product_id','=','dbo_product.id')
        ->join('dbo_supplier','dbo_input_detail.supplier_id','=','dbo_supplier.id')
        ->select('dbo_input_detail.*','dbo_product.*','dbo_supplier.name as supplier')
        ->where('dbo_input_detail.input_id',$id)->get();
        $input =  DB::table('dbo_input')->where('dbo_input.id',$id)->get();
        return view('admin.edit_input')->with('all_input',$all_input)->with('input',$input);
    }
    public function update_input(Request $request,$id){
        $this->AuthLogin();
        $data = array();
        $data['status'] = $request->input_status;
        DB::table('dbo_input')->where('id',$id)->update($data);
        return Redirect::to('all-input');
    }
}
