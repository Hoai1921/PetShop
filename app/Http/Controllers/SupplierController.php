<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SupplierController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
           return Redirect::to('admin.dashboard');
        }else{
        return Redirect::to('admin')->send();
        }
    }
    public function supplier(){
        $this->AuthLogin();
        $all_supplier = DB::table('dbo_supplier')->get();
        $manager_supplier = view('admin.supplier')->with('all_supplier',$all_supplier);
        return view('admin_layout')->with('admin.supplier',$manager_supplier);
    }
    public function save_supplier(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['phone_number'] = $request->phone_number;

        DB::table('dbo_supplier')->insert($data);
        Session::put('message','Thêm nhà cung cấp thành công');
        return Redirect::to('supplier');
    }
    public function edit_supplier($id){
        $this->AuthLogin();
        $edit_supplier = DB::table('dbo_supplier')->where('id',$id)->get();
        $manager_supplier = view('admin.edit_supplier')->with('edit_supplier',$edit_supplier);
        return view('admin_layout')->with('admin.edit_supplier',$manager_supplier);
    }
    public function update_supplier(Request $request, $id){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['phone_number'] = $request->phone_number;

        DB::table('dbo_supplier')->where('id',$id)->update($data);
        Session::put('message','Cập nhật nhà cung cấp thành công');
        return Redirect::to('supplier');
    }
    public function delete_supplier($id){
        $this->AuthLogin();
        DB::table('dbo_supplier')->where('id',$id)->delete();
        Session::put('message','Xoá nhà cung cấp thành công');
        return Redirect::to('supplier');
    }
}
