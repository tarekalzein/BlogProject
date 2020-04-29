<?php
include ('db/sql_query.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="javascript/scripts.js"></script>

    <!-- Sweet Alert Custom Alert  https://sweetalert.js.org/guides/ -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

    <div class="new-post-form">
        <h1>New Blog Post Entry</h1>
        <form action="" method="POST" type="multipart/form-data">
            <h2>Title</h2>
            <input type="text" name="title" placeholder="post title...">

            <h2>Content</h2>
            <textarea name="content"  cols="60" rows="10" placeholder="post content..."></textarea>
            <br>
            <h2>Category</h2>
            <select name="category" id="category">
                <option value="politics">Politics</option>
                <option value="tech">Tech</option>
                <option value="entertainment">Entertainment</option>
                <option value="travel">Travel</option>
            </select>
            <br>
            <input name="published" type="checkbox" value="1"> Publish
            <br>
            <h2>Post Image</h2>
            <input type="file" name="fileToUpload" accept="image/*">
            <br>


            <button type="submit" name="submit">Post</button>
<!--            -->
            <?php
            if (isset($_POST['submit'])) {
                 $title=$_POST['title'];
                 $content=$_POST['content'];
                 $category=$_POST['category'];
                 $published= isset($_POST['published']) ? 1 : 0;

                 $author='TAREK ALZEIN';
                 $image='images/images_1.jpb';


                 if(addNewPost($title,$content,$category,$author,$image,$published))
                 {
//                   If input is saved then pop a SweetAlert alert then redirect to dashboard.php (PRG 'POST/RETURN/GET' pattern)
                     echo "<script type='text/javascript'>";
                     echo "swal({title: 'Saved', icon:'success'}).then(function(){window.location.href='dashboard.php';});";
                     echo "</script>";
                 }else{
                     echo "<script type='text/javascript'>swal({title: 'Error saving your post', icon:'error'});</script>";
                 }
            }
            ?>
        </form>
    </div>

</div>
</body>
<footer>
    <?php include ('footer.php');?>
</footer>
</html>
