@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Nhà Cung Cấp
                        </header>
                        <div class="panel-body">
                        @foreach($edit_supplier as $key => $edit_value)
                            <div class="position-center">
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                                ?>
                                
                                <form role="form" action="{{URL::to('/update-supplier/'.$edit_value->id)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    <label for="name">Tên Nhà Cung Cấp</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{$edit_value->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Địa Chỉ</label>
                                    <input type="text" name="address" class="form-control" id="name" value="{{$edit_value->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Số Điện Thoại</label>
                                    <input type="number" name="phone_number" class="form-control" id="name" value="{{$edit_value->phone_number}}">
                                </div>
                                <button type="submit" name="update_supplier" class="btn btn-info">Lưu</button>
                            </form>
                            
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
            
            
        </div>
@endsection