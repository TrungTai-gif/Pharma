<?php
session_start();
include "includes/functions.php";
singUp();
?>

<head>
    <title>
        PharmEasy
    </title>
    <link rel="icon" href="images/logo.png" type="image/icon type">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<div class="container">
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Đăng ký</div>
            </div>
            <?php
            message();
            ?>
            <div class="panel-body">
                <form id="signupform" class="form-horizontal" role="form" method="post" action="signUp.php">
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Địa chỉ email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">Tên</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="Fname" placeholder="Tên">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Họ</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="Lname" placeholder="Họ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-md-3 control-label">Địa chỉ</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="passwd" placeholder="Mật khẩu">
                        </div>
                    </div>

                    <div style=" margin-left: 39px;">
                        <b>Mật khẩu phải chứa các điều kiện sau:</b>
                        <ul>
                            <li>Ít nhất 1 số và 1 chữ cái</li>
                            <li>Dài từ 8 đến 30 ký tự</li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <input id="btn-login" class="btn btn-success" type="submit" value="Đăng ký" name="singUp" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                Bạn đã có tài khoản?
                                <a href="login.php">
                                    Đăng nhập tại đây
                                </a>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
