
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

<?php if(isset($results)){?>
    <?php foreach ($results as $index=>$result){?>
       <div>
           评论人：<?php echo $result->username;?>
           评论文章：<?php echo $result->title?>
           评论内容：<?php echo $result->content;?>
           <a  href="admin/delete_comment?comment_id=<?php echo $result->comm_id;?>">删除</a>
       </div>
    <?php }?>
<?php }?>

</body>
</html>
