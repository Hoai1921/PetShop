<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class Brand extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
           return Redirect::to('admin.dashboard');
        }else{
        return Redirect::to('admin')->send();
        }
    }
    public function brand(){
        $this->AuthLogin();
        $all_brand = DB::table('dbo_brand')->get();
        $manager_brand = view('admin.brand')->with('all_brand',$all_brand);
        return view('admin_layout')->with('admin.brand',$manager_brand);
    }
    public function save_brand(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;

        DB::table('dbo_brand')->insert($data);
        Session::put('message','Thêm thương hiệu thành công');
        return Redirect::to('brand');
    }
    public function edit_brand($id){
        $this->AuthLogin();
        $edit_brand = DB::table('dbo_brand')->where('id',$id)->get();
        $manager_brand = view('admin.edit_brand')->with('edit_brand',$edit_brand);
        return view('admin_layout')->with('admin.edit_brand',$manager_brand);
    }
    public function update_brand(Request $request, $id){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;

        DB::table('dbo_brand')->where('id',$id)->update($data);
        Session::put('message','Cập nhật thương hiệu thành công');
        return Redirect::to('brand');
    }
    public function delete_brand($id){
        $this->AuthLogin();
        DB::table('dbo_brand')->where('id',$id)->delete();
        Session::put('message','Xoá thương hiệu thành công');
        return Redirect::to('brand');
    }
    //end function admin page

    public function show_brand_home($id){
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();
        $brand_name = DB::table('dbo_brand')->where('dbo_brand.id',$id)->limit(1)->get();
        $brand_by_id = DB::table('dbo_product')->join('dbo_brand','dbo_product.id','=','dbo_brand.id')->where('dbo_product.brand_id',$id)->get();
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
}
