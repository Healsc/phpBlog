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
            <div>
                <div>
                    <a href="javascript:";></a>
                    <button id="all" type="button">全选</button>
                    <button id="no" type="button">取消</button>
                    <button id="reverse" type="button">反选</button>
                    <button id="del">删除选中</button>
                </div>
                <div>
                    <?php
                    foreach ($articles as $article){
                        ?>
                        <li>

                            <div>
                                <input type="checkbox" name="article" value="<?php echo $article->article_id;?>">
                                <span>
                            <a href="admin/get_article_by_id?id=<?php echo $article->article_id;?>" target="_blank">
                                  <?php echo $article->title;?>
                            </a>
                        </span>
                                <sapn>
                                    <?php echo $article->post_date;?>
                                </sapn>
                            </div>

                        </li>
                    <?php }?>
                </div>
            </div>
            <script>
                $(function(){
                    $('#del').on('click',function(){
                        if(confirm('是否删除？')){
                            let str = '';
                            $(':checked').each(function(){
                                str = str + this.value + ",";
                                //console.log(this.value)
                            });
                            str = str.slice(0,-1);
                            console.log(str);
                            $.get("admin/delete_articles",{
                                'ids':str
                            },function (data) {
                                console.log(data)
                                if(data == 'success'){
                                    $(':checked').parent().remove();
                                    console.log('删除成功');
                                }else{
                                    console.log('删除失败');
                                }
                            },'text');
                        }
                    });
                    $('#all').click(function(){
                        $("[name = article]:checkbox").prop("checked",true);
                    })
                    $('#no').click(function(){
                        $("[name = article]:checkbox").prop('checked',false);
                    })
                    $('#reverse').click(function(){
                        var $checked = $('[name = article]:checkbox:checked');
                        var $unChcked = $('[name = article]:checkbox:not(:checked)');
                        $checked.prop('checked',false);
                        $unChcked.prop('checked',true)
                    })
                });

            </script>
        </div>
    </main>
</div>


</body>
</html>

<!---->
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Document</title>-->
<!--    <style>-->
<!--        li{-->
<!--            list-style: none;-->
<!--        }-->
<!--    </style>-->
<!--    <base href="--><?php //echo site_url();?><!--">-->
<!--    <script src="assets/js/jquery.js"></script>-->
<!--</head>-->
<!--<body>-->
<!--   -->
<!--</body>-->
<!--</html>-->

