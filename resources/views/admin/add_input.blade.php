@extends('admin_layout')
@section('admin_content')

<form role="form" action="{{URL::to('/save-input')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thông Tin Phiếu Nhập Kho
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
                        <div class="form-group">
                            <label for="name">Người Vận Chuyển</label>
                            <input type="text" name="transporter" class="form-control" id="transporter" placeholder="Người Vận Chuyển">
                        </div>
                        <div class="form-group">
                            <label for="name">Số Điện Thoại</label>
                            <input type="number" name="phone_transporter" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Kho Nhập Hàng</label>
                            <select name="warehouse" class="form-control m-bot15">
                            @foreach($warehouse as $key => $ware)
                            <option value="{{$ware->id}}">{{$ware->address}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Trạng Thái Phiếu Nhập</label>
                            <select name="status" class="form-control m-bot15">
                            <option value="1">Đã Đặt Hàng</option>
                            <option value="2">Đã Giao Hàng</option>
                            <option value="3">Đã Thanh Toán</option>
                            </select>
                        </div>
                        <button type="submit" name="add_input" class="btn btn-info">Thêm</button>
                    </div>
                </div>
            </section>
    </div>
</div>
</form>
<form role="form" action="{{URL::to('/save-input-detail')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thông Tin Sản Phẩm Nhập
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <div class="form-group">
                            <label for="description">Sản Phẩm Nhập</label>
                            <select name="product" class="form-control m-bot15">
                            @foreach($product as $key => $pro)
                            <option value="{{$pro->id}}">{{$pro->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Nhà Cung Cấp</label>
                            <select name="supplier" class="form-control m-bot15">
                            @foreach($supplier as $key => $supp)
                            <option value="{{$supp->id}}">{{$supp->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="name">Hạn Sử Dụng</label>
                            <input type="datetime-local" name="expiry_date" class="form-control" placeholder="Hạn Sử Dụng">
                            <?php $input_id = Session::get('input') ?>
                            <input type="hidden" name="input_id" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="name">Giá Nhập</label>
                            <input type="number" name="import_price" class="form-control" id="name" placeholder="Giá nhập sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="name">Số Lượng Nhập</label>
                            <input type="number" name="qty" class="form-control" id="name" placeholder="Số lượng">
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
    </div>
</form>
@endsection