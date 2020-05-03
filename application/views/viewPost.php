<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="<?php echo site_url();?>">
    <script src="assets/js/jquery.js"></script>
    <style>
        .container{
            padding: 10px 100px;
        }
        .article .article-title{
            font-size: 16px;
            font-weight: bold;
            background-color: #eee;
            padding: 5px 10px;
        }
        .article .acticle-time{
            font-size: 12px;
            background-color: #eee;
            padding: 5px 10px;
        }
        .article .article-content{
            padding: 5px 10px;
        }
    </style>
</head>
<body>
<?php $row = isset($row)?$row:"";?>
    <div class="container">
        <div class="article">
            <div class="article-title">
                <?php echo $row->title;?>
            </div>
            <div class="acticle-time">
                <?php echo $row->type_name?>
                <br/>
                <?php echo $row->post_date?>
            </div>
            <div>

            </div>
            <div class="article-content">
                <?php echo html_entity_decode($row->content, ENT_QUOTES, 'UTF-8') ?>
            </div>
        </div>
        <div>
            <?php if(isset($preArticle)) {
             ?>
                <div>
                    <a href="admin/get_article_by_id?id=<?php echo $preArticle->article_id;?>">上篇</a>
                </div>
            <?php
                }
            ?>
            <?php if(isset($nextArticle)) {
                ?>
                <div>
                    <a href="admin/get_article_by_id?id=<?php echo $nextArticle->article_id;?>">下篇</a>
                </div>
            <?php
                }
            ?>

        </div>

        <?php if(isset($comment_result)){?>
            <h5>评论</h5>
            <?php
            foreach ($comment_result as $comment){
                ?>
                    <div>
                        <sapn>
                            <?php echo $comment->username;?>
                            <?php echo $comment->content;?>
                            <?php echo $comment->post_date;?>

                        </sapn>
                    </div>
            <?php }?>
        <?php }?>

    </div>


    <script>
        $(function () {

        })
    </script>
</body>
</html>
