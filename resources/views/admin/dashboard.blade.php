@extends('admin_layout')
@section('admin_content')
<div class="market-updates">
			<div class="col-md-6 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Đang Chờ Xử Lý</h4>
					<h3>{{$order->total-$order->win}} Đơn</h3>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-6 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Người Dùng</h4>
						<h3>{{$user->total}} Tài Khoản</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-6 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Doanh Thu</h4>
						<h3>{{number_format($money,0,',','.')}} VND</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-6 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Đơn Hàng Đã Đặt</h4>
						<h3>{{$order->total}} Đơn</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
        @endsection