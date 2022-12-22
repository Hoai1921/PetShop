@extends('welcome')
@section('content')
<form action="{{URL::to('/save-checkout')}}" method="post">
    {{csrf_field()}}
<div class="panel panel-default">
<h3 class="page-title">Hoá Đơn</h3>
    <div class="panel-heading">
        <h5 class="panel-title"><span>1</span> <a data-bs-toggle="collapse" href="#payment-2">Thông Tin Người Nhận</a></h5>
    </div>
    <div id="payment-2" class="panel-collapse collapse" data-bs-parent="#faq">
        <div class="panel-body">
            <div class="billing-information-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="billing-info">
                            <label>Họ và tên</label>
                            <input type="text" name="username" placeholder="Họ và tên">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="billing-info">
                            <label>Địa chỉ Email</label>
                            <input type="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="billing-info">
                            <label>Địa Chỉ</label>
                            <input type="text" name="address" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="billing-info">
                            <label>Số Điện Thoại</label>
                            <input type="text" name="phone_number" placeholder="Số điện thoại">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title"><span>2</span> <a data-bs-toggle="collapse" href="#payment-5">Phương Thức Thanh Toán</a></h5>
    </div>
    <div id="payment-5" class="panel-collapse collapse" data-bs-parent="#faq">
        <div class="panel-body">
            <div class="payment-info-wrapper">
                <div class="ship-wrapper">
                @foreach($transaction as $key => $tran)
                    <div class="single-ship">
                        <input type="radio" checked="" value="{{$tran->id}}" name="transaction">
                        <label>{{$tran->name}}</label>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title"><span>3</span> <a data-bs-toggle="collapse" href="#payment-6">Chi Tiết Đơn Hàng</a></h5>
        <?php
        $content = Cart::content();
        ?>
    </div>
    <div id="payment-6" class="panel-collapse collapse" data-bs-parent="#faq">
        <div class="panel-body">
            <div class="order-review-wrapper">
                <div class="order-review">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="width-1">Tên Sản Phẩm</th>
                                    <th class="width-2">Giá</th>
                                    <th class="width-3">Số Lượng</th>
                                    <th class="width-4">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($content as $key => $pro)
                                <tr>
                                    <td>
                                        <div class="o-pro-dec">
                                            <p>{{$pro->name}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="o-pro-price">
                                            <p>{{number_format($pro->price,0,',','.')}} VND</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="o-pro-qty">
                                            <p>{{$pro->qty}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="o-pro-subtotal">
                                            <p>
                                                <?php
                                                $subtotal = $pro->price*$pro->qty;
                                                echo number_format($subtotal,0,',','.').' '.'VND';
                                                ?>
                                            </p>
                                        </div>
                                    </td>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Tổng Tiền</td>
                                    <td colspan="1">{{Cart::priceTotal(0,',','.')}} VND</td>
                                </tr>
                                <tr class="tr-f">
                                    <td colspan="3">Phí vận chuyển</td>
                                    <td colspan="1">{{Cart::tax(0,',','.')}} VND</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Tổng Tiền Đơn Hàng</td>
                                    <td colspan="1">{{Cart::total(0, ',', '.')}} VND</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="billing-back-btn">
                        <span>
                            Vui lòng kiểm tra lại thông tin đơn hàng!
                            <a href="{{URL::to('/show-cart')}}"> Quay lại giỏ hàng</a>

                        </span>
                        <div class="billing-btn">
                            <button type="submit">Thanh Toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection