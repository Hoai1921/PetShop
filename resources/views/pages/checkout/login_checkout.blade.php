@extends('welcome')
@section('content')
<div class="login-register-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ms-auto me-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-bs-toggle="tab" href="#lg1">
                                    <h4> Đăng Nhập </h4>
                                </a>
                                <a data-bs-toggle="tab" href="#lg2">
                                    <h4> Đăng Ký </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <?php
                                        $message = Session::get('message');
                                        if($message){
                                            echo '<span class="text-alert" style="color: red;">'.$message.'</span>';
                                            Session::put('message',null);
                                        }
                                        ?>
                                            <form action="{{URL::to('/login-user')}}" method="post">
                                            {{csrf_field()}}
                                                <input type="email" name="username" placeholder="E-mail">
                                                <input type="password" name="password" placeholder="Mật Khẩu">
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Ghi nhớ đăng nhập</label>
                                                        <a href="#">Quên mật khẩu</a>
                                                    </div>
                                                    <button type="submit"><span>Đăng Nhập</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{URL::to('/add-user')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="text" name="full_name" placeholder="Họ và tên">
                                                <input type="datetime-local" name="birth_day" placeholder="Ngày sinh">
                                                <select name="gender" class="form-control m-bot15">
                                                    <option value="null">Giới tính</option>
                                                    <option value="0">Nam</option>
                                                    <option value="1">Nữ</option>
                                                </select>
                                                <input type="text" name="address" placeholder="Địa chỉ">
                                                <input type="number" name="phone_number" placeholder="Số điện thoại">
                                                <input type="email" name="email" placeholder="Email">
                                                <input type="password" name="password" placeholder="Mật Khẩu">
                                                <div class="button-box">
                                                    <button type="submit"><span>Đăng Ký</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection