@extends('welcome')
@section('content')
<div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Giỏ Hàng</h3>
                <?php
                $content = Cart::content();
                ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr> 
                                            <th>Hình Ảnh</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Giá Bán</th>
                                            <th>Số Lượng</th> 
                                            <th>Cập Nhật</th>  
                                            <th>Tổng Tiền</th>
                                            <th>Xoá Sản Phẩm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($content as $key => $pro)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="{{URL::to('public/upload/product/'.$pro->options->image)}}" alt="" width="150"></a>
                                            </td>
                                            <td class="product-name">{{$pro->name}}</td>
                                            <td class="product-price-cart"><span class="amount">{{number_format($pro->price,0,',','.')}} VND</span></td>
                                            <form action="{{URL::to('/update-cart')}}" method="POST">
                                                {{csrf_field()}}
                                            <td class="product-quantity">
                                                <input class="cart-plus-minus-box" type="text" name="cart_quantity" value="{{$pro->qty}}">
                                                <input type="hidden" value="{{$pro->rowId}}" name="rowId_cart" class="form-control">
                                            </td>
                                            <td>
                                                <button class="cart-btn-2" type="submit" style="margin-left: 40px;">save</button>
                                            </td>
                                            </form>
                                            <td class="product-subtotal">
                                                <?php
                                                $subtotal = $pro->price*$pro->qty;
                                                echo number_format($subtotal,0,',','.').' '.'VND';
                                                ?>
                                            </td>
                                            <td class="product-remove"><a href="{{URL::to('/delete-to-cart/'.$pro->rowId)}}"><i class="ti-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="{{URL::to('/home')}}">Xem Thêm Sản Phẩm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                        <div class="col-md-6"></div>
                            <div class="col-lg-7 col-md-6">
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="grand-totall">
                                    <span>Tổng Giỏ Hàng: {{Cart::priceTotal(0,',','.')}} VND</span>
                                    <span>Phí Vận Chuyển: {{Cart::tax(0,',','.')}} VND</span>
                                    <h5>Tổng Tiền: {{Cart::total(0, ',', '.')}} VND</h5>
                                    <?php
                                        $user_id = Session::get('user_id');
                                        if($user_id!=NULL){
                                            
                                    ?>
                                    <a href="{{URL::to('/show-checkout')}}">Mua Hàng</a>
                                    <?php
                                        }else{
                                    ?>
                                    <a href="{{URL::to('/login-checkout')}}">Mua Hàng</a>
                                    <?php } ?>
                                    <p>Vui lòng kiểm tra kĩ thông tin đơn hàng trước khi mua hàng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection