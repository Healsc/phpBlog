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
    <link rel="stylesheet" href="assets/css/header.css">
    <style>
        .admin{
            margin-left: 25%;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php $loginUser = isset($loginUser)?$loginUser:""?>
        <?php if($loginUser){?>
            <div id="header">
                <div class="header-name"><?php echo $loginUser->username;?> 's Blog</div>
                <div class="header-mood"><?php echo $loginUser->mood;?></div>
            </div>
        <?php }?>


        <div id="nav">
                <h5 class="nav-title">个人信息管理</h5>
                <div>
                    <a  href="admin/new_blog">编辑个人资料</a>
                    <br/>
                    <a href="admin/list_blogs">修改登录密码</a>
                </div>
                <h5 class="nav-title">博客管理</h5>
                <div>
                    <a  href="admin/new_blog">发表文章</a>
                    <br/>
                    <a href="admin/get_blog_type">分类管理</a>
                    <br/>
                    <a href="admin/list_blogs">文章管理</a>
                    <br/>
                    <a href="admin/get_comment_about_me">评论管理</a>
                </div>
        </div>

    </div>


</body>
</html>


