@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Sản Phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                                ?>
                                @foreach($edit_product as $key => $pro)
                                <form role="form" action="{{URL::to('/update-product/'.$pro->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Tên Sản Phẩm</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{$pro->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Hình Ảnh Sản Phẩm</label>
                                    <input type="file" name="main_image" class="form-control" id="name">
                                    <img src="{{URL::to('public/upload/product/'.$pro->main_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="description">Danh Mục Sản Phẩm</label>
                                    <select name="category" class="form-control m-bot15">
                                    @foreach($category_id as $key => $cate)
                                        @if($cate->id==$pro->category_id)
                                        <option selected value="{{$cate->id}}">{{$cate->name}}</option>
                                        @else
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Thương Hiệu</label>
                                    <select name="brand" class="form-control m-bot15">
                                    @foreach($brand_id as $key => $brand)
                                        @if($brand->id==$pro->brand_id)
                                        <option selected value="{{$brand->id}}">{{$brand->name}}</option>
                                        @else
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô Tả Sản Phẩm</label>
                                    <textarea style="resize: none" row="8" class="form-control" name="description_long" id="description">{{$pro->description_long}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Tóm Tắt Sản Phẩm</label>
                                    <textarea style="resize: none" row="8" class="form-control" name="description_short" id="description">{{$pro->description_short}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Giá Sản Phẩm</label>
                                    <input type="text" name="price" class="form-control" id="name" value="{{$pro->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Đơn Vị Sản Phẩm</label>
                                    <input type="text" name="unit" class="form-control" id="name" value="{{$pro->unit}}">
                                </div>
                                <button type="submit" name="update_product" class="btn btn-info">Lưu</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
            </div>
@endsection