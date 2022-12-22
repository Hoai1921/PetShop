<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class Product extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
           return Redirect::to('admin.dashboard');
        }else{
        return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();
        
        return view('admin.add_product')->with('category_id',$cate_product)->with('brand_id',$brand_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('dbo_product')
        ->join('dbo_category','dbo_category.id','=','dbo_product.category_id')
        ->join('dbo_brand','dbo_brand.id','=','dbo_product.brand_id')
        ->select('dbo_product.*','dbo_category.name as category_name','dbo_brand.name as brand_name')
        ->orderby('dbo_product.id','desc')->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;
        $data['category_id'] = $request->category;
        $data['brand_id'] = $request->brand;
        $data['description_long'] = $request->description_long;
        $data['description_short'] = $request->description_short;
        $data['status'] = $request->status;
        $data['price'] = $request->price;
        $data['unit'] = $request->unit;

        $get_image = $request->file('main_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['main_image'] = $new_image;
            DB::table('dbo_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('all-product');
        }

        $data['main_image'] = '';
        DB::table('dbo_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($id){
        $this->AuthLogin();
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();
        $edit_product = DB::table('dbo_product')->where('id',$id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('category_id',$cate_product)->with('brand_id',$brand_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function update_product(Request $request, $id){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;
        $data['category_id'] = $request->category;
        $data['brand_id'] = $request->brand;
        $data['description_long'] = $request->description_long;
        $data['description_short'] = $request->description_short;
        $data['price'] = $request->price;
        $data['unit'] = $request->unit;

        $get_image = $request->file('main_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['main_image'] = $new_image;
            DB::table('dbo_product')->where('id',$id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }

        DB::table('dbo_product')->where('id',$id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($id){
        $this->AuthLogin();
        DB::table('dbo_product')->where('id',$id)->delete();
        Session::put('message','Xoá sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function active_product($id){
        $this->AuthLogin();
        DB::table('dbo_product')->where('id',$id)->update(['status'=>0]);
        Session::put('message','Kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function unactive_product($id){
        $this->AuthLogin();
        DB::table('dbo_product')->where('id',$id)->update(['status'=>1]);
        Session::put('message','Huỷ kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }

    //end function admin page

    public function details_product($id){
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();
        $details_product = DB::table('dbo_product')
        ->join('dbo_category','dbo_category.id','=','dbo_product.category_id')
        ->join('dbo_brand','dbo_brand.id','=','dbo_product.brand_id')
        ->select('dbo_product.*','dbo_category.name as category_name','dbo_brand.name as brand_name')
        ->where('dbo_product.id',$id)->get();
        
        foreach($details_product as $key){
            $category_id = $key->category_id;
            $brand_id = $key->brand_id;
        }
        $related_product = DB::table('dbo_product')
        ->join('dbo_category','dbo_category.id','=','dbo_product.category_id')
        ->join('dbo_brand','dbo_brand.id','=','dbo_product.brand_id')
        ->select('dbo_product.*','dbo_category.name as category_name','dbo_brand.name as brand_name')
        ->where('dbo_product.category_id',$category_id)->where('dbo_product.brand_id',$brand_id)->whereNotIn('dbo_product.id', [$id])->get();
        return view('pages.product.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product)->with('related_product',$related_product);
    }
}
