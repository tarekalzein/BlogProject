<?php
include ('db/sql_query.php');
if(isset($_SESSION['id']))
{
    $id = $_SESSION['id'];
    $user = getUserById($id);
    $userPosts=getUserPosts($user['id']);
}
else
    {
        header('location: denied.php');
}

if(isset($_GET['delete']))
{
//TODO: do something here to delete.

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="javascript/scripts.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--    Font Awesome implementation-->
    <script src="https://kit.fontawesome.com/dedb547a55.js" crossorigin="anonymous"></script>
    <!--    Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <title>SomeBlog Home Page</title>

</head>
<body>
<header>
    <?php include('header.php');
    ?>
</header>
<div class="content">
    <div class="dashboard-wrapper">
        <div class="dashboard-menu">

            <!--Tabs from w3schools tutorial https://www.w3schools.com/howto/howto_js_tabs.asp-->
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'myPosts')" id="defaultOpen">My Posts</button>
                <button class="tablinks" onclick="openTab(event, 'myProfile')">My Profile</button>
                <a href="index.php?logout=true" class="logout-button">Logout</a>
            </div>

            <div id="myPosts" class="tabcontent" >
                <h3>My Posts</h3>
                <hr>
                <div class="dashboard-posts-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th class="title-header">Title</th>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Published</th>
                            <th></th> <!--Space for edit button-->
                            <th></th> <!--Space for delete button-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($userPosts as $post): ?>

                        <tr>
                            <td><a href="post.php?id=<?php echo $post['id'];?>"><?php echo $post['title'];?></a></td>
                            <td><?php echo $post['date'];?></td>
                            <td><?php echo $post['category'];?></td>
                            <td><i class="fas fa-check <?php if($post['published']) echo 'checked'?>"></i></td>
                            <td><a href="#"><i class="far fa-edit edit-btn"></i></a></td>
<!--                            TODO: FUNCTION: EDIT-->
<!--                            TODO: FUNCTION: DELETE-->
                            <td><a href="dashboard.php?delete=<?php echo $post['id']?>"><i class="far fa-trash-alt delete-btn"></i></a></td>
                        </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                    <button class="new-post-btn" onclick="document.location.href='new.php'">Add new</button>
                </div>

            </div>

            <div id="myProfile" class="tabcontent">
                <h3>My Profile</h3>
                <p>This tab will show info about the user's profile.</p>
            </div>

        </div>



    </div>


</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="javascript/tabs.js"></script>
</body>
<footer>
    <?php include ('footer.php');?>
</footer>
</html>
