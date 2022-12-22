@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Nhà Cung Cấp
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
                                <form role="form" action="{{URL::to('/save-supplier')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Tên Nhà Cung Cấp</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Tên Nhà Cung Cấp">
                                </div>
                                <div class="form-group">
                                    <label for="name">Địa Chỉ</label>
                                    <input type="text" name="address" class="form-control" id="name" placeholder="Địa Chỉ Nhà Cung Cấp">
                                </div>
                                <div class="form-group">
                                    <label for="name">Số Điện Thoại</label>
                                    <input type="number" name="phone_number" class="form-control" id="name" placeholder="Số Điện Thoại Nhà Cung Cấp">
                                </div>
                                <button type="submit" name="supplier" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
            <div class="col-lg-12">
            <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                Danh Sách Nhà Cung Cấp
                </div>
                <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>                
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
                </div>
                <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                        <label class="i-checks m-b-none">
                            <input type="checkbox"><i></i>
                        </label>
                        </th>
                        <th>Tên Nhà Cung Cấp</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($all_supplier as $key => $cate_pro)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$cate_pro->name}}</td>
                        <td>{{$cate_pro->address}}</td>
                        <td>{{$cate_pro->phone_number}}</td>
                        <td>
                        <a href="{{URL::to('/edit-supplier/'.$cate_pro->id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xoá Nhà Cung Cấp này không?')" href="{{URL::to('/delete-supplier/'.$cate_pro->id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-times text-danger text"></i>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <footer class="panel-footer">
                <div class="row">
                    
                    <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">                
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                    </div>
                </div>
                </footer>
            </div>
            </div>
            </div>
        </div>
@endsection