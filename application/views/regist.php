<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="assets/css/reset.css">
    <style>
        .container{
            position: absolute;
            top: 0;
            bottom: 0;
            left:0;
            right: 0;
            /*background-color: #515a6e;*/
           
        }
        .bg-img{
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .bg-img img{
            width: 100%;
            height: 100%;
        }
        .show-info{
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translateX(-50%);
        }
        .regist-form{
            width: 400px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform:translate(-50%,-50%);
            border: 1px solid #dcdee2;
            padding: 20px 40px 10px 40px;
        }
        p{
            display: flex;
            margin-top: 20px;
            color: #fff;
        }
        .regist-form .part-one{
            flex: 1;
        }
        .regist-form .part-two{
            font-size: 14px;
            flex: 3;
            text-align: center;
            border: 1px solid #ddd;
        }
        .regist-form .regist-form-submit{
            margin-top: 20px;
            width: 300px;
            background-color: #31b968;
            height: 30px;
        }

    </style>
</head>

<body>
<div class="bg-img">
    <img  src="assets/imgs/login_bg.jpg" alt="">
</div>

<div class="container">

     <span class="show-info" style="color:red">
                <?php echo isset($error_name)?$error_name:"";?>
                <?php echo isset($error_rename)?$error_rename:"";?>
                <?php echo isset($error_pwd)?$error_pwd:"";?>
                <?php echo isset($error_repwd)?$error_repwd:"";?>
                <?php echo isset($error_buyizhi)?$error_buyizhi:"";?>
     </span>
    <form class="regist-form" action="welcome/save_regist" method="post">
        <p>
            <span class="part-one">用户名：</span>
            <input class="part-two" type="text" name="username" placeholder="请输入用户名">

        </p>
        <p>
            <span  class="part-one">密码：</span>
            <input  class="part-two" type="password" name="password" placeholder="请输入密码">
        </p>
        <p>
            <span  class="part-one">确认密码：</span>
            <input  class="part-two" type="password" name="repassword" placeholder="请输入确认密码">
        </p>
        <p>
            <input class="regist-form-submit" " type="submit" value="注册">
        </p>

    </form>

</div>



</body>
</html>