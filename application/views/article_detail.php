
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="<?php echo site_url();?>">
</head>
<body>
    <div>
       <div>
           标题
           <?php
           echo $article->title;
           ?>
       </div>

        <div>
            作者：   <?php echo $article->username ?>
        </div>
        <div>
            发布于  <?php echo $article->post_date ?>
        </div>
        <div>
            <?php echo html_entity_decode($article->content, ENT_QUOTES, 'UTF-8') ?>
        </div>

    </div>

    <?php if($comment_result){?>
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



    <form action="admin/save_comment" method="post">
        <input type="text" name="content">
        <input type="hidden" name="id" value="<?php echo $article->article_id;?>">
        <input type="submit" value="留言">
    </form>
</body>
</html>
