
@extends('welcome')
@section('content')
<div class="section-title text-center mb-55">
                    @foreach($category_name as $key => $category_name)
                    <h2>{{$category_name->name}}</h2>
                    @endforeach
                </div>
<div class="shop-topbar-wrapper">
                            <div class="product-sorting-wrapper">
                                <div class="product-show shorting-style">
                                    <label>Showing <span>1-20</span> of <span>100</span> Results</label>
                                    <select>
                                        <option value="">12</option>
                                        <option value="">24</option>
                                        <option value="">36</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid-list-options">
                                <ul class="view-mode">
                                    <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid4-alt"></i></a></li>
                                    <li><a href="#product-list" data-view="product-list"><i class="ti-align-justify"></i></a></li>
                                </ul>
                            </div>
</div>
<div class="grid-list-product-wrapper">
                            <div class="product-view product-grid">
                                <div class="row">
                            @foreach($cate_by_id as $key => $pro)
                                    <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                                        <div class="product-wrapper mb-10">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img src="{{URL::to('public/upload/product/'.$pro->main_image)}}" alt="" height="268px" width="268px">
                                                </a>
                                                <div class="product-action">
                                                    <a title="Chi Tiết Sản Phẩm" href="{{URL::to('/chi-tiet-san-pham/'.$pro->id)}}">
                                                        <i class="ti-plus"></i>
                                                    </a>
                                                    <form action="{{URL::to('/save-cart')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input name="productid_hidden" type="hidden" value="{{$pro->id}}">
                                                        <input type="hidden" name="qty" value="1">
                                                        <button title="Thêm voà giỏ hàng">
                                                            <i class="ti-shopping-cart"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <!-- <div class="product-action-wishlist">
                                                    <a title="Wishlist" href="#">
                                                        <i class="ti-heart"></i>
                                                    </a>
                                                </div> -->
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">{{$pro->name}}</a></h4>
                                                <div class="product-price">
                                                    <span class="new">{{number_format($pro->price,0,',','.')}} VND</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                <div class="pagination-style text-center mt-10">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon-arrow-left"></i></a>
                                        </li>
                                        <li>
                                            <a href="#">1</a>
                                        </li>
                                        <li>
                                            <a href="#">2</a>
                                        </li>
                                        <li>
                                            <a class="active" href="#"><i class="icon-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
@endsection