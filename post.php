<?php
include ('db/sql_query.php');
$postId=$_GET['id'];
//show only published or all if user is logged in.
$post=getOnePost($postId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="javascript/scripts.js"></script>

    <!--    Font Awesome implementation-->
    <script src="https://kit.fontawesome.com/dedb547a55.js" crossorigin="anonymous"></script>
    <!--    Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <title>POST</title>

</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<div class="content">
    <div class="main-content-wrapper clearfix">
        <div class="single-post">
            <h1><?php echo $post['title']?></h1>
            <h4>By <?php echo $post['author']?></h4>
            <h5>Published: <?php echo $post['date']?></h5>
            <img src="<?php echo $post['image']?>" alt="">
            <p><?php echo $post['content']?></p>
        </div>
    </div>



</div>
</body>
<footer>
    <?php include ('footer.php');?>
</footer>
</html>
