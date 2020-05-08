<?php
include ('db/sql_query.php');
if(isset($_GET['id']))
{
    $postId=$_GET['id'];
    //Don't show posts that are not published for other than the publisher.
    $post=selectOneRecord($postId);
    if(!$post['published'] &&  $post['author_id']!=$_SESSION['id'])
    {
        header('location: denied.php');
    }
    //Increment only if other users than the publisher are visiting the paqe.
    else if(!isset($_SESSION['id']) || $post['author_id']!=$_SESSION['id']){
        incrementPostViews($postId);
    }
}
else
    {
        //Opening post.php without a post id (post.php?id=x) will redirect the user to homepage.
        header('location: index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport" content="width=device-width,initial-scale=1.0">-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/scripts.js"></script>

    <!--    Font Awesome implementation-->
    <script src="https://kit.fontawesome.com/dedb547a55.js" crossorigin="anonymous"></script>
    <!--    Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <title><?php echo $post['title'];?></title>

</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<div class="content">
    <div class="main-content-wrapper clearfix">
        <div class="single-post">
            <h1 class="title"><?php echo $post['title']?></h1>
            <h4>By <?php echo $post['username']?></h4>
            <h5>Published: <?php echo ((new DateTime($post['date']))->format('Y-m-d'));?></h5>
            <img src="<?php echo $post['image']?>" alt="">
            <div class="post-content"><?php echo $post['content']?></div>
        </div>
    </div>



</div>
<footer>
    <?php include ('footer.php');?>
</footer>
</body>
</html>
