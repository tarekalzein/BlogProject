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
                <button class="logout-button">Logout</button>
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
                        <tr>
                            <td>this is a title</td>
                            <td>20/20/2020</td>
                            <td>Tech</td>
                            <td><i class="fas fa-check"></i></td><!--Add php instead of checked, for example: <?php //if (published == 1) echo 'checked'; ?>-->
                            <td><a href="#"><i class="far fa-edit edit-btn"></i></a></td>
                            <td><a href="#"><i class="far fa-trash-alt delete-btn"></i></a></td>
                        </tr>
                        <tr>
                            <td>this is a title</td>
                            <td>20/20/2020</td>
                            <td>Tech</td>
                            <td><i class="fas fa-check checked"></i></td> <!--Add php instead of checked, for example: <?php //if (published == 1) echo 'checked'; ?>-->
                            <td><a href="#"><i class="far fa-edit edit-btn"></i></a></td>
                            <td><a href="#"><i class="far fa-trash-alt delete-btn"></i></a></td>
                        </tr>
                        <tr>
                            <td>this is a title</td>
                            <td>20/20/2020</td>
                            <td>Tech</td>
                            <td><i class="fas fa-check"></i></td><!--Add php instead of checked, for example: <?php //if (published == 1) echo 'checked'; ?>-->
                            <td><a href="#"><i class="far fa-edit edit-btn"></i></a></td>
                            <td><a href="#"><i class="far fa-trash-alt delete-btn"></i></a></td>
                        </tr>
                        <tr>
                            <td>this is a title</td>
                            <td>20/20/2020</td>
                            <td>Tech</td>
                            <td><i class="fas fa-check"></i></td><!--Add php instead of checked, for example: <?php //if (published == 1) echo 'checked'; ?>-->
                            <td><a href="#"><i class="far fa-edit edit-btn"></i></a></td>
                            <td><a href="#"><i class="far fa-trash-alt delete-btn"></i></a></td>
                        </tr>


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

<script type="text/javascript" src="javascript/tabs.js"></script>
</body>
<footer>
    <?php include ('footer.php');?>
</footer>
</html>
