<?php
include('db/sql_query.php');
if(isset($_GET['logout']))
{
    session_unset();
    session_destroy();
}
$posts=getRecentPublishedPosts();
$trendingPosts=getTrendingPosts();
$users=getTopUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport" content="width=device-width,initial-scale=1.0">-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <!--    Font Awesome implementation-->
    <script src="https://kit.fontawesome.com/dedb547a55.js" crossorigin="anonymous"></script>
<!--    Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <title>SomeBlog Homepage</title>

</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<div class="content">
<!--    Post Slider -->
    <div class="post-slider">
        <h1 class="slider-title">Trending Posts</h1>
        <i class="fas fa-chevron-left prev"></i>
        <i class="fas fa-chevron-right next"></i>

        <div class="post-wrapper">
            <?php foreach($trendingPosts as $trendingPost): ?>
            <div class="post">
                <img src="<?php echo $trendingPost['image'];?>" alt="" class="slider-image">
                <div class="post-info">
                    <h4><a class="post-title" href="post.php?id=<?php echo $trendingPost['id'];?>"><?php echo $trendingPost['title']?></a></h4>
                    <br>
                    By:
<!--                    <i class="far fa-user">   &nbsp; </i><a href="topics.php?user=--><?php //echo $trendingPost['author_id']?><!--" class="post-author">--><?php //echo $trendingPost['username']?><!--</a>-->
                    <a href="topics.php?user=<?php echo $trendingPost['author_id']?>" class="post-author"><?php echo $trendingPost['username']?></a>

                    <!--                    &nbsp;<br>&nbsp;<br>-->
<!--                    <i class="far fa-calendar">&nbsp;</i><span>--><?php //echo $trendingPost['date']?><!--</span>-->
                    <a href="topics.php?category=<?php echo $trendingPost['category']; ?>" class="post-category <?php echo $trendingPost['category'];?>"><?php echo $trendingPost['category']?></a>
                </div>
            </div>
            <?php endforeach;?>


        </div>
    </div>
<!--    //Post Slider-->

<!--    Main Content Section-->
    <div class="main-content-wrapper clearfix">
        <div class="main-content">
            <h2 class="recent-posts-title">Recent Posts</h2>
            <?php foreach ($posts as $post): ?>
            <div class="post">
                <img class="post-image" src="<?php echo $post['image'];?>" alt="">
                <div class="post-preview">
                    <h2><a href="post.php?id=<?php echo $post['id'];?>" class="post-title"><?php echo $post['title'];?></a></h2>
                    <i class="far fa-user">   &nbsp; </i><a href="topics.php?user=<?php echo $post['author_id']?>" class="post-author"><?php echo $post['username'];?></a>
                    <i class="far calendar">&nbsp;</i><span><?php echo $post['date'];?></span>
                    <p class="preview-txt">
                        <?php echo (substrwords(strip_tags($post['content']),200)) ;?> <!--//strip tags is used to clear formatting.-->
                    </p>
                    <a href="post.php?id=<?php echo $post['id'];?>" class="btn read-more">Read More...</a>
                    <a href="topics.php?category=<?php echo $post['category']; ?>" class="post-category <?php echo $post['category'];?>"><?php echo $post['category'];?></a>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="show-all-btn"><a href="topics.php?category=all">Show all posts</a></div>
        </div>
        <!--End of Main Content-->


        <div class="side-bar">
            <div class="top-users-box">
                <h3>Top Bloggers:</h3>
                <ul>
                    <?php foreach ($users as $user): ?>
                        <li>
                            <a href="topics.php?user=<?php echo $user['author_id'];?>"><?php echo $user['username'];?> </a>
                            &nbsp (<?php echo $user['totalPosts'];
                                    if($user['totalPosts']==1){ echo ' post';}
                                    else echo ' posts';?> )
                        </li>
                    <?php endforeach;?>

                </ul>
                <a href="users.php" class="show-all-users-btn"> Show All.</a>
            </div>

        </div>


    </div>
</div>

<!--Slick JS script import using cdn.-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>
<footer>
    <?php include ('footer.php');?>
</footer>
</html>
