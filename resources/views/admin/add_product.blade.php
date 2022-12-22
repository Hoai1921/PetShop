@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm
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
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Tên Sản Phẩm</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="name">Hình Ảnh Sản Phẩm</label>
                                    <input type="file" name="main_image" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="description">Danh Mục Sản Phẩm</label>
                                    <select name="category" class="form-control m-bot15">
                                    @foreach($category_id as $key => $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Thương Hiệu</label>
                                    <select name="brand" class="form-control m-bot15">
                                    @foreach($brand_id as $key => $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô Tả Sản Phẩm</label>
                                    <textarea style="resize: none" row="8" class="form-control" name="description_long" id="description" placeholder="Mô Tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Tóm Tắt Sản Phẩm</label>
                                    <textarea style="resize: none" row="8" class="form-control" name="description_short" id="description" placeholder="Tóm Tắt sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Hiển Thị</label>
                                    <select name="status" class="form-control m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Giá Sản Phẩm</label>
                                    <input type="text" name="price" class="form-control" id="name" placeholder="Giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="name">Đơn Vị Sản Phẩm</label>
                                    <input type="text" name="unit" class="form-control" id="name" placeholder="Đơn Vị sản phẩm">
                                </div>
                                <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            </div>
@endsection