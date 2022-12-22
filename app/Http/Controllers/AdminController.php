<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
           return Redirect::to('admin.dashboard');
        }else{
        return Redirect::to('admin')->send();
        }
    }
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        $user = DB::table('dbo_user')->selectRaw('count(*) as total')->first();
        $order = DB::table('dbo_order')->selectRaw('count(*) as total')
        ->selectRaw("count(case when status = '5' then 1 end) as win")->first();
        $money = DB::table('dbo_order')->sum('total_money');
        return view('admin.dashboard')->with('user',$user)->with('order',$order)->with('money',$money);
    }
    public function dashboard(Request $request){
        $username = $request->username;
        $password = md5($request->password);

        $result = DB::table('dbo_user')
        ->join('dbo_user_role','dbo_user.id','dbo_user_role.user_id')
        ->where('username',$username)->where('password',$password)->where('role_id','1')->first();
        if($result){
            Session::put('id',$result->id);
            return Redirect::to('/dashboard');
        }
        else{
            Session::put('message','Mật khẩu hoặc E-mail không chính xác. Mời nhập lại!');
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('id',null);
        return Redirect::to('/admin');
    }
}
