<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index(){
        
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();
        $all_product = DB::table('dbo_product')->where('status','1')->get();
        $new_product = DB::table('dbo_product')->where('status','1')->orderby('id','desc')->limit(1)->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('new_product',$new_product)->with('all_product',$all_product);
    }
    public function search(Request $request){
        
        $cate_product = DB::table('dbo_category')->orderby('id','desc')->get();
        $brand_product = DB::table('dbo_brand')->orderby('id','desc')->get();

        $keywords =  $request->search;
        $search_product = DB::table('dbo_product')->where('status','1')
        ->where('name','like','%'.$keywords.'%')->orwhere('price','like','%'.$keywords.'%')->get();
        return view('pages.product.search')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('search_product',$search_product);
    }
}
