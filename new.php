<?php
include ('db/sql_query.php');
$target_dir= "uploads/";
$userId=$_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
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
            <input type="text" name="title" placeholder="post title...">

            <h2>Content</h2>
            <textarea name="content" id="content" cols="60" rows="10" placeholder="post content..."></textarea>
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

                $author_id=$userId;

                 //Image checks:
                $uploadOk = 1;
                if(!empty($_FILES["fileToUpload"]["name"]))
                {
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    //Check if file exists.
                    if(file_exists($target_file))
                    {
                        echo "<script type='text/javascript'>swal({title: 'File Already exists', icon:'error'});</script>";
                        $uploadOk=0;
                    }

                    //Check File Size <2 mb
                    if($_FILES["fileToUpload"]["size"]> 2000000 )
                    {
                        echo "<script type='text/javascript'>swal({title: 'File is too large',text:'Maximum file size: 2 MB ', icon:'error'});</script>";
                        $uploadOk=0;
                    }

                    //Check file format
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
                    {
                        echo "<script type='text/javascript'>swal({title: 'File format error',text:'only JPG, JPEG, PNG files are allowed ', icon:'error'});</script>";
                        $uploadOk=0;
                    }

                    if($uploadOk==1)
                    {
                        $target_file=$target_dir. $title."-".$_FILES["fileToUpload"]["name"];
                        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
                        {
                            $image= $target_file;
                        }
                        else{
                            echo "<script type='text/javascript'>swal({title: 'Error in uploading file to server', icon:'error'});</script>";
                        }
                    }

                }else{
                    $image='images/placeholder.jpg';
                }
                if($uploadOk==1)
                {
                    if(addNewPost($title,$content,$category,$author_id,$image,$published))
                    {
//                   If input is saved then pop a SweetAlert alert then redirect to dashboard.php (PRG 'POST/RETURN/GET' pattern)
                        echo "<script type='text/javascript'>";
                        echo "swal({title: 'Saved', icon:'success'}).then(function(){window.location.href='dashboard.php';});";
                        echo "</script>";
                    }else{
                        echo "<script type='text/javascript'>swal({title: 'Error saving your post', icon:'error'});</script>";
                    }
                }

                //TODO: change Image file name so it adds the username too or something?
                //TODO: Form verification.

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
