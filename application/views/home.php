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
        li{
            list-style: none;
        }
    </style>
</head>
<body>



<?php
$articles = isset($articles)?$articles:"";
?>
<?php
$types = isset($types)?$types:"";
?>

<div>
    <h4>用户名</h4>
    <?php
        echo $userinfo->username;
//    $loginUser = $this -> session -> userdata('loginUser');
//    echo $loginUser -> username;
    ?>
</div>

<div>
    <h4>博客文章</h4>
    <?php
    foreach ($articles as $article){
        ?>
        <li>

            <div>
                <span><?php echo $article -> title;?></span>
                <span><?php echo $article -> type_name;?></span>
            </div>
        </li>
    <?php }?>
</div>


<div>
    <h4>博客分类</h4>
    <?php
    foreach ($types as $type){
        ?>
        <li>
            <div>
                    <span><?php echo $type->type_name;?>
                        (<?php echo$type -> num;?>)
                    </span>

            </div>
        </li>
        <?php
    }
    ?>
</div>

</body>
</html>

