<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="<?php echo site_url()?>">
    <link rel="stylesheet" href="assets/css/reset.css">
    <style>
        .container{
            width: 800px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .header{
            background-color: #31b968;
            height: 40px;
            line-height: 40px;
            color: #ffffff;
            display: flex;
            width: 100%;
        }
        .header .header-title{
            margin-left: 20px;
        }
        .header .header-title a{
            font-size: 14px;
        }
        .header .header-mood{
            flex: 1;
            text-align: right;
        }
        .main{
            margin-top: 20px;
            margin-left: 20px;
            display: flex;
        }
        .main .nav{
            width: 150px;

        }
        .nav .nav-title{
            margin-top: 10px;
        }
        .nav a{
            font-size: 12px;
        }
        .main .content{
            flex: 1;
        }
    </style>
</head>
<body>

<div class="container">
    <header class="header">
        <?php $loginUser = $this->session->userdata('loginUser');?>
        <?php if($loginUser){?>
                <div class="header-title"><?php echo $loginUser->username;?> 's Blog
                    <a style="" href="welcome/login_out">退出</a>
                </div>
                <div class="header-mood">
                    <?php echo $loginUser->mood;?>
                </div>
        <?php }else{?>
            <div id="header">
                <a href="welcome/login">未登录</a>
            </div>
        <?php }?>
    </header>

    <main class="main">
        <nav class="nav">
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
        </nav>

        <div class='content'>
            <?php if(isset($results)){?>
                <table >
                    <tr>
                        <th>序号</th>
                        <th>分类名</th>
                        <th>文章</th>
                        <th>操作</th>

                    </tr>
                    <?php foreach ($results as $index=>$result){?>

                        <tr>
                            <td><?php echo $index + 1;?></td>
                            <td><?php echo $result->type_name;?></td>
                            <td><?php echo $result->num?></td>
                            <td>
                                <form action="admin/update_type">
                                    <input type="hidden" name="type_id" value="<?php echo $result->type_id?>">
                                    <input style="width: 40px" type="text" name="type_name">
                                    <input type="submit" value="修改">
                                </form>
<!--                                <a href="javascript:;">修改</a>-->
                            </td>
                            <br/>
                        </tr>


                    <?php }?>
                </table>

            <?php }?>
        </div>
    </main>
</div>


</body>
</html>
