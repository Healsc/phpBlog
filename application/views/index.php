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

       .heder{
           width: 100%;
           background-color: #00CC00;
           height: 40px;
           padding-left: 40px;
           line-height: 40px;
           text-align: center;
       }
        .container{
            width: 800px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .article-list{
            margin-left: 50px;
        }
        .article-list .article-item{
           margin-bottom: 10px;
        }
        .article-list .article-author{
            font-size: 12px;
        }
        .article-list .article-time{
            font-size: 12px;
        }
    </style>
    <base href="<?php echo site_url();?>">
</head>
<body>
<?php $loginUser = $this->session->userdata('loginUser');
?>
    <div class="container">
        <header class="heder">
          <?php if($loginUser){?>
              <a href="admin/index">
                  <?php echo $loginUser->username;?><span> 's Blog</span>
              </a>

              <a style="font-size:10px;margin-left:10px" href="welcome/login_out">退出</a>
            <?php }else{?>
              <a href="welcome/login">未登录</a>
              <a href="welcome/regist">注册</a>
            <?php }?>
        </header>
        <div class="article-list">
            <h5>最新文章</h5>
            <?php foreach ($articles as $article){?>
                <div class="article-item">
                    <div>
                        <a href="article/get_article_by_id?id=<?php echo $article->article_id;?>">
                           <?php echo $article->title;?>
                        </a>

                    </div>
                     <div class="article-author">
                         <a href="welcome/home?id=<?php echo $article->user_id;?>">
                             <?php echo $article->username;?>
                         </a>

                     </div>
                     <div class="article-time">
                        <?php echo $article->post_date;?>
                     </div>

                </div>
            <?php }?>
        </div>

    </div>



</body>
</html>

