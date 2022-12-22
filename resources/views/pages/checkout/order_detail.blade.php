@extends('welcome')
@section('content')
<div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Chi Tiết Đơn Hàng</h3>
            </div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="width-1">Hình Ảnh</th>
                <th class="width-2">Tên Sản Phẩm</th>
                <th class="width-2">Mô Tả</th>
                <th class="width-2">Số Lượng</th>
                <th class="width-3">Giá</th>
            </tr>
        </thead>
        <tbody>
        @foreach($order_detail as $key => $or)
            <tr>
                <td>
                    <div class="o-pro-dec">
                        <a href="#"><img src="{{URL::to('public/upload/product/'.$or->main_image)}}" alt="" width="150"></a>
                    </div>
                </td>
                <td>
                    <div class="o-pro-dec">
                        <p>{{$or->name}}</p>
                    </div>
                </td>
                <td>
                    <div class="o-pro-dec">
                        <p>{{$or->description_long}}</p>
                    </div>
                </td>
                <td>
                    <div class="o-pro-dec">
                        <p>{{$or->quantity}}</p>
                    </div>
                </td>
                <td>
                    <div class="o-pro-dec">
                        <p>{{number_format($or->price,0,',','.')}} VND</p>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection