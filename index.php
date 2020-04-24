<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <!--    Font Awesome implementation-->
    <script src="https://kit.fontawesome.com/dedb547a55.js" crossorigin="anonymous"></script>
<!--    Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <title>SomeBlog Home Page</title>

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
            <div class="post">
                <img src="images/image_1.jpg" alt="" class="slider-image">
                <div class="post-info">
                    <h4><a class="post-title" href="single.html">Lorem Ipsum</a></h4>
                    <i class="far fa-user">   &nbsp; </i><a href="#" class="post-author">Lorem Ipsum</a>
                    &nbsp;
                    <i class="far fa-calendar">&nbsp;</i><span>2020, April 23</span>
                    <a href="#" class="post-category">Politics</a>
                </div>
            </div>
            <div class="post">
                <img src="images/image_2.jpg" alt="" class="slider-image">
                <div class="post-info">
                    <h4><a class="post-title" href="single.html">Ipsum Lorem </a></h4>
                    <i class="far fa-user">   &nbsp; </i><a href="#" class="post-author">Lorem Ipsum</a>
                    &nbsp;
                    <i class="far fa-calendar">&nbsp;</i><span>2020, April 20</span>
                    <a href="#" class="post-category">Tech</a>
                </div>
            </div>
            <div class="post">
                <img src="images/image_1.jpg" alt="" class="slider-image">
                <div class="post-info">
                    <h4><a class="post-title" href="single.html">Lorem Ipsum</a></h4>
                    <i class="far fa-user">   &nbsp; </i><a href="#" class="post-author">Lorem Ipsum</a>
                    &nbsp;
                    <i class="far fa-calendar">&nbsp;</i><span>2020, April 23</span>
                    <a href="#" class="post-category">Politics</a>
                </div>
            </div>
            <div class="post">
                <img src="images/image_2.jpg" alt="" class="slider-image">
                <div class="post-info">
                    <h4><a class="post-title" href="single.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.  </a></h4>
                    <i class="far fa-user">   &nbsp; </i><a href="#" class="post-author">Lorem Ipsum</a>
                    &nbsp;
                    <i class="far fa-calendar">&nbsp;</i><span>2020, April 20</span>
                    <a href="#" class="post-category">Tech</a>
                </div>
            </div>
            <div class="post">
                <img src="images/image_1.jpg" alt="" class="slider-image">
                <div class="post-info">
                    <h4><a class="post-title" href="single.html">Lorem Ipsum</a></h4>
                    <i class="far fa-user">   &nbsp; </i><a href="#" class="post-author">Lorem Ipsum</a>
                    &nbsp;
                    <i class="far fa-calendar">&nbsp;</i><span>2020, April 23</span>
                    <a href="#" class="post-category">Politics</a>
                </div>
            </div>
        </div>
    </div>
<!--    //Post Slider-->

<!--    Main Content Section-->
    <div class="main-content-wrapper clearfix">
        <div class="main-content">
            <h2 class="recent-posts-title">Recent Posts</h2>
            <br>
            
            <div class="post">
                <img class="post-image" src="images/image_2.jpg" alt="">
                <div class="post-preview">
                    <h2><a href="single.php" class="post-title">Lorem Ipsum Title</a></h2>
                    <i class="far fa-user">   &nbsp; </i><a href="#" class="post-author">Lorem Ipsum</a>
                    <i class="far calendar">&nbsp;</i><span>2020, April 23</span>
                    <p class="preview-txt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Proin sit amet feugiat nisi, eu molestie arcu. Curabitur vitae auctor tellus, eu molestie sapien.
                        Cras faucibus nec mi luctus lacinia. Nullam ac ante venenatis, hendrerit tortor sit amet, suscipit augue.
                    </p>
                    <a href="single.html" class="btn read-more">Read More...</a>
                    <a href="#" class="post-category">Tech</a>

                </div>
            </div>
            <div class="post">
                <img class="post-image" src="images/image_1.jpg" alt="">
                <div class="post-preview">
                    <h2><a href="single.php" class="post-title">Lorem Ipsum Title</a></h2>
                    <i class="far fa-user">   &nbsp; </i><a href="#" class="post-author">Lorem Ipsum</a>
                    <i class="far calendar">&nbsp;</i><span>2020, April 23</span>
                    <p class="preview-txt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Proin sit amet feugiat nisi, eu molestie arcu. Curabitur vitae auctor tellus, eu molestie sapien.
                        Cras faucibus nec mi luctus lacinia. Nullam ac ante venenatis, hendrerit tortor sit amet, suscipit augue.
                    </p>
                    <a href="single.html" class="btn read-more">Read More...</a>
                    <a href="#" class="post-category">Politics</a>


                </div>
            </div>
            <div class="post">
                <img class="post-image" src="images/image_2.jpg" alt="">
                <div class="post-preview">
                    <h2><a href="single.php" class="post-title">Lorem Ipsum Title</a></h2>
                    <i class="far fa-user">   &nbsp; </i><a href="#" class="post-author">Lorem Ipsum</a>
                    <i class="far calendar">&nbsp;</i><span>2020, April 23</span>
                    <p class="preview-txt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Proin sit amet feugiat nisi, eu molestie arcu. Curabitur vitae auctor tellus, eu molestie sapien.
                        Cras faucibus nec mi luctus lacinia. Nullam ac ante venenatis, hendrerit tortor sit amet, suscipit augue.
                    </p>
                    <a href="single.html" class="btn read-more">Read More...</a>
                    <a href="#" class="post-category">Tech</a>


                </div>
            </div>
            <div class="post">
                <img class="post-image" src="images/image_1.jpg" alt="">
                <div class="post-preview">
                    <h2><a href="single.php" class="post-title">Lorem Ipsum Title</a></h2>
                    <i class="far fa-user">   &nbsp; </i><a href="#" class="post-author">Lorem Ipsum</a>
                    <i class="far calendar">&nbsp;</i><span>2020, April 23</span>
                    <p class="preview-txt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Proin sit amet feugiat nisi, eu molestie arcu. Curabitur vitae auctor tellus, eu molestie sapien.
                        Cras faucibus nec mi luctus lacinia. Nullam ac ante venenatis, hendrerit tortor sit amet, suscipit augue.
                    </p>
                    <a href="single.html" class="btn read-more">Read More...</a>
                    <a href="#" class="post-category">Politics</a>


                </div>
            </div>

        </div>
<!--        //Main Content-->


        <div class="side-bar">
        </div>

        <!--TODO: add a place to show recent bloggers and button to show all bloggers.-->

    </div>
</div>

<!--Slick JS script import using cdn.-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>
<footer>
    <?php include ('footer.php');?>
</footer>
</html>
