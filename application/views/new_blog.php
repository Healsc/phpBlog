<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Default Examples</title>
    <style>
        form {
            margin: 0;
        }
        textarea {
            display: block;
        }
    </style>
    <base href="<?php echo site_url()?>">
    <link rel="stylesheet" href="assets/kindeditor/themes/default/default.css" />
    <script charset="utf-8" src="assets/kindeditor/kindeditor-all-min.js"></script>
    <script charset="utf-8" src="assets/kindeditor/lang/zh-CN.js"></script>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <style>
        .post-article{
            margin-left: 20%;
        }
        .btn-submit{
            margin-top: 10px;
            width: 100px;
            background-color: #00CC00;
        }
    </style>
</head>
<body>

    <div class="container">
        <div id="header">
            <?php $loginUser = isset($loginUser)?$loginUser:""?>
            <div class="header-name"><?php echo $loginUser->username;?> 's Blog</div>
            <div class="header-mood"><?php echo $loginUser->mood;?></div>
        </div>

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
        <div class="post-article">


            </p>
                <form action="admin/save_type" method="post">
                    <input type="text" name="type_name">
                    <input type="hidden" name="user_id" value="<?php echo $loginUser->user_id;?>">
                    <input type="submit" value="添加类型">
                </form>
            <p>

            <form action="admin/post_article" method="post">
                <p>
                    <span>标题</span>
                    <input style="width: 400px" name="title" type="text">

                </p>
                <p>
                    <span>类型</span>
                    <select name="type_id" id="">
                        <?php
                        foreach ($types as $type){
                            ?>
                            <option value="<?php echo$type->type_id;?>">
                                <?php echo $type->type_name;?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>


                </p>
                <textarea name="content" style="width:800px;height:400px;visibility:hidden;">KindEditor</textarea>

                <input class="btn-submit" type="submit" value="发布" style="margin-top: 10px">
            </form>
        </div>
    </div>



    <script>

        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="content"]', {
                resizeType : 1,
                allowPreviewEmoticons : false,
                allowImageUpload : false,
            });
        });
    </script>

</body>
</html>

