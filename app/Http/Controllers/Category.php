<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class Category extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
           return Redirect::to('admin.dashboard');
        }else{
        return Redirect::to('admin')->send();
        }
    }
    public function category(){
        $all_category = DB::table('dbo_category')->get();
        $manager_category = view('admin.category')->with('all_category',$all_category);
        return view('admin_layout')->with('admin.category',$manager_category);
    }
    public function save_category(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;

        DB::table('dbo_category')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return Redirect::to('category');
    }
    public function edit_category($id){
        $this->AuthLogin();
        $edit_category = DB::table('dbo_category')->where('id',$id)->get();
        $manager_category = view('admin.edit_category')->with('edit_category',$edit_category);
        return view('admin_layout')->with('admin.edit_category',$manager_category);
    }
    public function update_category(Request $request, $id){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;

        DB::table('dbo_category')->where('id',$id)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return Redirect::to('category');
    }
    public function delete_category($id){
        $this->AuthLogin();
        DB::table('dbo_category')->where('id',$id)->delete();
        Session::put('message','Xoá danh mục thành công');
        return Redirect::to('category');
    }

    //end function admin page

    public function show_category_home($id){
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();
        $category_name = DB::table('dbo_category')->where('dbo_category.id',$id)->limit(1)->get();
        $cate_by_id = DB::table('dbo_product')->join('dbo_category','dbo_product.id','=','dbo_category.id')->where('dbo_product.category_id',$id)->get();
        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('cate_by_id',$cate_by_id)->with('category_name',$category_name);
    }
}
