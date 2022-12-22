@extends('admin_layout')
@section('admin_content')
<div class="row">            
    <div class="col-lg-12">
    <div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Cập nhật trạng thái phiếu nhập kho
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
                <th>Trạng Thái Phiếu Nhập</th>
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($input as $key => $in)
            <form action="{{URL::to('/update-input/'.$in->id)}}" method="POST">
                {{csrf_field()}}
            <tr>
                <td>
                <select name="input_status" class="form-control m-bot15">
                    <option value="1">Đã Đặt Hàng</option>
                    <option value="2">Đã nhận Hàng</option>
                    <option value="3">Đã Thanh Toán</option>
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
        Chi Tiết Phiếu Nhập
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
                <th>Hạn Sử Dụng</th>
                <th>Nhà Cung Cấp</th>
                <th>Số Lượng</th>
                <th>Giá Nhập</th>
                <th>Tổng Tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($all_input as $key => $in )
            <tr>
                <td><img src="{{URL::to('public/upload/product/'.$in->main_image)}}" height="100" width="100"></td>
                <td>{{$in->name}}</td>
                <td>{{$in->expiry_date}}</td>
                <td>{{$in->supplier}}</td>
                <td>{{$in->theoretical_amount}}</td>
                <td>{{number_format($in->import_price,0,',','.')}} VND</td>
                <td>{{number_format($in->import_price*$in->theoretical_amount,0,',','.')}} VND</td>
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