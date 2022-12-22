@extends('welcome')
@section('content')
<div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Đơn Hàng Của Bạn</h3>
            </div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="width-1">Tên Người Nhận</th>
                <th class="width-2">Địa Chỉ</th>
                <th class="width-2">Email</th>
                <th class="width-3">Số điện thoại</th>
                <th class="width-3">Trạng thái đơn hàng</th>
                <th class="width-4">Tổng Tiền</th>
            </tr>
        </thead>
        <tbody>
        @foreach($order as $key => $or)
            <tr>
                <td>
                    <div class="o-pro-dec">
                        <a href="{{URL::to('/order-detail/'.$or->id)}}">
                            <p>{{$or->username}}</p>
                        </a>
                    </div>
                </td>
                <td>
                    <div class="o-pro-dec">
                        <p>{{$or->address}}</p>
                    </div>
                </td>
                <td>
                    <div class="o-pro-dec">
                        <p>{{$or->email}}</p>
                    </div>
                </td>
                <td>
                    <div class="o-pro-dec">
                        <p>{{$or->phone_number}}</p>
                    </div>
                </td>
                <td>
                    <div class="o-pro-dec">
                        <p>
                            <?php
                            $status = $or->status;
                            if($status==1){
                                echo 'Đang xử lý';
                            }
                            if($status==2){
                                echo 'Đã nhận đơn';
                            }
                            if($status==3){
                                echo 'Đang chuẩn bị hàng';
                            }
                            if($status==4){
                                echo 'Đang giao';
                            }
                            if($status==5){
                                echo 'Hoàn thành';
                            }
                            ?>
                        </p>
                    </div>
                </td>
                <td>
                    <div class="o-pro-dec">
                        <p>{{number_format($or->total_money,0,',','.')}} VND</p>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection