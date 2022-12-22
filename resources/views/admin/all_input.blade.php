@extends('admin_layout')
@section('admin_content')
<div class="row">            
            <div class="col-lg-12">
            <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                Danh Sách Phiếu Nhập Kho
                </div>
                <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs"></div>
                <div class="col-sm-4"></div>
                <div class="col-sm-3"></div>
                </div>
                <div class="table-responsive">
                    <?php
                        $message = Session::get('message');
                        if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                        }
                    ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Người Tạo</th>
                        <th>Người Vận Chuyển</th>
                        <th>Số Điện Thoại</th>
                        <th>Kho Nhập</th>
                        <th>Trạng Thái</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_input as $key => $in)
                    <tr>
                        <td>{{$in->full_name}}</td>
                        <td>{{$in->transporter}}</td>
                        <td>{{$in->phone_transporter}}</td>
                        <td>{{$in->warehouse}}</td>
                        <td>
                        <?php
                            $status = $in->status;
                            if($status==1){
                                echo 'Đã đặt hàng';
                            }
                            if($status==2){
                                echo 'Đã giao hàng';
                            }
                            if($status==3){
                                echo 'Đã thanh toán';
                            }
                            ?>
                        </td>
                        <td>
                        <a href="{{URL::to('/edit-input/'.$in->id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                        </a>
                        </td>
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