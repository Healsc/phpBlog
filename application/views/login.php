<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="<?php echo site_url();?>">
    <style>
        .container{
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
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
        .container .show-info{
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translateX(-50%);
        }
        .container .login-form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 300px;
            padding: 20px 40px 10px 40px;

        }

        .container .login-form .submit-btn{
            background-color: #19be6b;
        }
        input{
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="bg-img">
        <img  src="assets/imgs/login_bg.jpg" alt="">
    </div>
    <div class="container">
        <div class="show-info">
            <span style="color:red">
                <?php echo isset($error_name)?$error_name:"";?>
            </span>
            <span style="color:red">
                <?php echo isset($error_pwd)?$error_pwd:"";?>
            </span>
            <span style="color:red">
                <?php echo isset($error_err)?$error_err:"";?>
            </span>
        </div>
        <form class="login-form" action="welcome/check_login" method="post">
            <p>
                <input class="part-two" type="text" name="username" placeholder="用户名">
            </p>
          <p>
              <input class="part-two" type="password" name="password" placeholder="请输入密码">
          </p>
          <p>
              <input class="submit-btn" type="submit" value="登录">
          </p>

        </form>
    </div>



</body>
</html>