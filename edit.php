<?php
//include ('db/sql_query.php');
include ('controllers/verify.php');
if(isset($_GET['delete']))
{
    deletPost($_GET['delete']);
    header('location: dashboard.php');
}
if(isset($_GET['delete-image']))
{
    $post=selectOneRecord($_GET['id']);
    deleteImage($post['id']);
    header('location:edit.php?id='.$_GET['id']);
}
if(isset($_GET['id']))
{
    $post=selectOneRecord($_GET['id']);
    if($post['author_id']!=$_SESSION['id'])
    {
        header('location: denied.php');
    }
    else
    {
        //logic for edit.
    }
}
else
{
    //Opening edit.php without a post id (post.php?id=x) will redirect the user to homepage.
//    header('location: index.php');
}

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
    <title>Edit Post</title>

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
            <input type="text" name="title" placeholder="post title..." value="<?php echo $post['title'];?>">

            <h2>Content</h2>
            <textarea name="content" id="content" cols="60" rows="10" placeholder="post content..." ><?php echo $post['content']?></textarea>
            <br>
            <h2>Category</h2>
            <select name="category" id="category">
                <option value="politics" <?php if($post['category']==='politics'){echo 'selected="selected"';}?>>Politics</option>
                <option value="tech" <?php if($post['category']==='tech'){echo 'selected="selected"';}?>>Tech</option>
                <option value="entertainment" <?php if($post['category']==='entertainment'){echo 'selected="selected"';}?>>Entertainment</option>
                <option value="travel" <?php if($post['category']==='travel'){echo 'selected="selected"';}?>>Travel</option>
            </select>
            <br>
            <input name="published" type="checkbox" value="1"<?php if($post['published']) echo "checked"?> > Publish
            <br>
            <h2>Post Image</h2>
            <?php if($post['image']==='images/placeholder.jpg')
            {
                echo "<p> The post has no image .... </p>";
            }
            else
            {

                echo '<br><a href="'.$post['image'].'"';
                echo '>'.$post["image"].'</a>&nbsp &nbsp<a href="edit.php?id='.$post['id'];
                echo '&delete-image"> <i class="far fa-trash-alt"></i></a><br><br>';
//                echo '>'.$post["image"].'</a><br><br>';

            }
                ?>
            <input type="file" name="fileToUpload" accept="image/*">
            <br>
            <button type="submit" name="submit">Post</button>
            <!--            -->
            <?php
            if (isset($_POST['submit'])) {
                echo editPost($post['id'],$post['image']);
            }
            ?>
        </form>
    </div>
</div>
<!--script of CKEditor for rich text in textarea.-->
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="javascript/scripts.js"></script>

</body>
<footer>
    <?php include ('footer.php');?>
</footer>
</html>
