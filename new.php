<?php
//include ('db/sql_query.php');
include ('controllers/verify.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport" content="width=device-width,initial-scale=1.0">-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <!-- Sweet Alert Custom Alert  https://sweetalert.js.org/guides/ -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--    Font Awesome implementation-->
    <script src="https://kit.fontawesome.com/dedb547a55.js" crossorigin="anonymous"></script>
    <!--    Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <title>New Post</title>

</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<div class="content">

    <div class="new-post-form">
        <h1>New Blog Post Entry</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>Title</h2>
            <input type="text" name="title" placeholder="post title..." value="<?php if(isset($_POST['title'])){echo $_POST['title'];}?>">

            <h2>Content</h2>
            <textarea name="content" id="content" cols="60" rows="10" placeholder="post content..." ><?php if(isset($_POST['content'])){echo $_POST['content'];}?></textarea>
            <br>
            <h2>Category</h2>
            <select name="category" id="category">
                <option value="politics" <?php if(isset($_POST['category'])&&$_POST['category']==='politics'){echo 'selected="selected"';}?>>Politics</option>
                <option value="tech" <?php if(isset($_POST['category'])&&$_POST['category']==='tech'){echo 'selected="selected"';}?>>Tech</option>
                <option value="entertainment" <?php if(isset($_POST['category'])&&$_POST['category']==='entertainment'){echo 'selected="selected"';}?>>Entertainment</option>
                <option value="travel" <?php if(isset($_POST['category'])&&$_POST['category']==='travel'){echo 'selected="selected"';}?>>Travel</option>
            </select>
            <br>
            <input name="published" type="checkbox"> Publish
            <br>
            <h2>Post Image</h2>
            <input type="file" name="fileToUpload" accept="image/*">
            <br>
            <button type="submit" name="submit">Post</button>
            <!--            -->
            <?php
            if (isset($_POST['submit'])) {
                echo verifyForm();
            }
            ?>
        </form>
    </div>
</div>
<!--script of CKEditor for rich text in textarea.-->
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script src="javascript/scripts.js"></script>


<footer>
    <?php include ('footer.php');?>
</footer>
</body>
</html>
