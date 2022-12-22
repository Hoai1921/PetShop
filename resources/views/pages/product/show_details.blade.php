@extends('welcome')
@section('content')
@foreach($product_details as $key => $pro)
<div class="row">
    <div class="col-lg-6 col-md-6">
                        <div class="product-details-img">
                            <img id="zoompro" src="{{URL::to('public/upload/product/'.$pro->main_image)}}" data-zoom-image="{{URL::to('public/upload/product/'.$pro->main_image)}}" alt="zoom"/>
                        </div>
    </div>
    <div class="col-lg-6 col-md-6">
                        <div class="product-details-content">
                            <h2>{{$pro->name}}</h2>
                            
                            <div class="product-price">
                                <span class="new-1">{{number_format($pro->price,0,',','.')}} VND</span>
                            </div>
                            <div class="in-stock">
                                <span><i class="ion-android-checkbox-outline"></i>Danh mục: {{$pro->category_name}}</span>
                            </div>
                            <div class="sku">
                                <span>Thương hiệu: {{$pro->brand_name}}</span>
                            </div>
                            <p>{{$pro->description_long}}</p>
                            <form action="{{URL::to('/save-cart')}}" method="post">
                                {{csrf_field()}}
                            <div class="quality-wrapper mt-30 product-quantity">
                                <label>Số Lượng:</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="number" name="qty" value="1">
                                    <input name="productid_hidden" type="hidden" value="{{$pro->id}}">
                                </div>
                            </div>
                            <div class="product-list-action">
                                <div class="product-list-action-left">
                                    <button class="addtocart-btn" href="" title="Add to cart">
                                        <i class="ion-bag"></i>
                                        Thêm Vào Giỏ Hàng
                                    </button>
                                </div>
                                <!-- <div class="product-list-action-right">
                                    <a href="#" title="Wishlist">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div> -->
                            </div>
                            </form>
                            
                        </div>
    </div>
</div>
@endforeach
<div class="related-product-area pt-95 pb-80 gray-bg">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h4>Sản Phẩm Liên Quan</h4>
                </div>
                <div class="row">
                @foreach($related_product as $key => $relate)
                                
                                    <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                                        <div class="product-wrapper mb-10">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="{{URL::to('public/upload/product/'.$relate->main_image)}}" alt="" height="268px" width="268px">
                                                </a>
                                                <div class="product-action">
                                                    <a title="Chi Tiết Sản Phẩm" href="{{URL::to('/chi-tiet-san-pham/'.$relate->id)}}">
                                                        <i class="ti-plus"></i>
                                                    </a>
                                                    <a title="Thêm vào giỏ hàng" href="#">
                                                        <i class="ti-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <!-- <div class="product-action-wishlist">
                                                    <a title="Wishlist" href="#">
                                                        <i class="ti-heart"></i>
                                                    </a>
                                                </div> -->
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">{{$relate->name}}</a></h4>
                                                <div class="product-price">
                                                    <span class="new">{{number_format($relate->price,0,',','.')}} VND</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                @endforeach
                </div>
            </div>
</div>


@endsection