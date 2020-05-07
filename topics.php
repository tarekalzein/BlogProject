<?php
include('db/sql_query.php');
//TEST
$pageHeader='';
if(isset($_GET['category']))
{
    switch($_GET['category'])
    {
        case 'politics':
            //show all published politics/
            $posts=getPublishedByCategory('politics');
            $pageHeader='Category: Politics';
            break;
        case 'tech':
            //show published tech
            $pageHeader='Category: Tech';
            $posts=getPublishedByCategory('tech');
            break;
        case 'entertainment':
            //show published entertainment;
            $pageHeader='Category: Entertainment';
            $posts=getPublishedByCategory('entertainment');
            break;
        case 'travel':
            //show published travel;
            $pageHeader='Category: Travel';
            $posts=getPublishedByCategory('travel');
            break;
        default:
            $posts=getAllPublishedPosts();
            $pageHeader='All Posts';
            break;
    }
}
else if(isset($_GET['user']))
{
    //show all published posts of the current user
    $posts=getPublishedByUser($_GET['user']);
    if(!empty($posts))
    $pageHeader='Posts by: '. $posts[0]['username'];
    else $pageHeader= 'This user has not published any post yet...';
}
else
{
    header('location: topics.php?category=all');
}
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
    <title>Topics</title>

</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<div class="content">

    <!--    Main Content Section-->
    <div class="main-content-wrapper clearfix">
        <div class="main-content">
            <h2 class="recent-posts-title"><?php echo $pageHeader;?></h2>
            <?php if(!empty($posts)) foreach ($posts as $post): ?>
                <div class="post">
                    <img class="post-image" src="<?php echo $post['image'];?>" alt="">
                    <div class="post-preview">
                        <h2><a href="post.php?id=<?php echo $post['id'];?>" class="post-title"><?php echo $post['title'];?></a></h2>
                        <i class="far fa-user">   &nbsp; </i><a href="topics.php?user=<?php echo $post['author_id']?>" class="post-author"><?php echo $post['username'];?></a>
                        <i class="far calendar">&nbsp;</i><span><?php echo ((new DateTime($post['date']))->format('Y-m-d'));?></span>
                        <p class="preview-txt">
                            <?php echo (substrwords(strip_tags($post['content']),200)) ;?> <!--//strip tags is used to clear formatting.-->
                        </p>
                        <a href="post.php?id=<?php echo $post['id'];?>" class="btn read-more">Read More...</a>
                        <a href="topics.php?category=<?php echo $post['category']; ?>" class="post-category <?php echo $post['category'];?>"><?php echo $post['category'];?></a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <!--End of Main Content-->


        <div class="side-bar">
        </div>


    </div>
</div>

<!--Slick JS script import using cdn.-->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<footer>
    <?php include ('footer.php');?>
</footer>
</body>
</html>
