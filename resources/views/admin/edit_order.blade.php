@extends('admin_layout')
@section('admin_content')
<div class="row">            
    <div class="col-lg-12">
    <div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Thông Tin Người Nhận 
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
        </div>
        </div>
        <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th>Tên Người Nhận</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $key => $or )
            <tr>
                <td>{{$or->username}}</td>
                <td>{{$or->address}}</td>
                <td>{{$or->phone_number}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
    </div>
</div>
<br>
<div class="row">            
    <div class="col-lg-12">
    <div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Cập nhật trạng thái đơn hàng 
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
        </div>
        </div>
        <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th>Trạng Thái Đơn Hàng</th>
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $key => $or)
            <form action="{{URL::to('/update-status/'.$or->id)}}" method="POST">
                {{csrf_field()}}
            <tr>
                <td>
                <select name="order_status" class="form-control m-bot15">
                    <option value="1">Đang xử lý</option>
                    <option value="2">Đã nhận đơn</option>
                    <option value="3">Đang chuẩn bị hàng</option>
                    <option value="4">Đang giao</option>
                    <option value="5">Hoàn thành</option>
                </select>
                </td>
                <td>
                    <button style="border: none;">
                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                    </button>   
                </td>
            </tr>
            </form>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
    </div>
</div>
<br>
<div class="row">            
    <div class="col-lg-12">
    <div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Chi Tiết Đơn Hàng
        </div>
        <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
        </div>
        </div>
        <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th>Hình Ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Tổng Tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($all_order as $key => $or )
            <tr>
                <td><img src="{{URL::to('public/upload/product/'.$or->main_image)}}" height="100" width="100"></td>
                <td>{{$or->name}}</td>
                <td>{{$or->quantity}}</td>
                <td>{{number_format($or->price,0,',','.')}} VND</td>
                <td>{{number_format($or->price*$or->quantity,0,',','.')}} VND</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        
    </div>
    </div>
    </div>
</div>
@endsection