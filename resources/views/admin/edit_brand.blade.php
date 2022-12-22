@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Thương Hiệu
                        </header>
                        <div class="panel-body">
                        @foreach($edit_brand as $key => $edit_value)
                            <div class="position-center">
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                                ?>
                                
                                <form role="form" action="{{URL::to('/update-brand/'.$edit_value->id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Tên Danh Mục</label>
                                    <input type="text" value="{{$edit_value->name}}" name="name" class="form-control" id="name" placeholder="Enter email">
                                </div>
                                <button type="submit" name="update_brand" class="btn btn-info">Lưu</button>
                            </form>
                            
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
            
            
        </div>
@endsection