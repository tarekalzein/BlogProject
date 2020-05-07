<?php
/**
 * verify.php is a controller php file that controls the inputs from users for:registration, login, new and edit posts.
 * it loops through user inputs and shows/pops up notifications about errors in inputs
 */
include ('db/sql_query.php');
/**
 * Verification of the login.php form.
 */
if(isset($_POST['login']))
{
    $errors=array();
    if(empty($_POST['email']))
    {
        array_push($errors,'Email is required');
    }
    if(empty($_POST['password']))
    {
        array_push($errors,'Password is required');
    }
    if(!empty($_POST['email']) && !empty($_POST['password'])) //check if email exists.
    {
        if(!checkEmailExists(strtolower($_POST['email'])))
            array_push($errors,"User doesn't exist.");
    }
    if(count($errors)===0)
    {
        //check password
        $user=getUserByEmail(strtolower($_POST['email']));
        {
            if(password_verify($_POST['password'],$user['password']))
            {
                $_SESSION['id']=$user['id'];
                header('location: dashboard.php');
            }
            else
                array_push($errors,"wrong email or password");
        }
    }
}
/**
 * Verification of the registration.
 */
if(isset($_POST['register']))
{
    $errors=array();

//    check if first name is empty
    if(empty($_POST['username']))
    {
        array_push($errors,'Username is required');
    }
    if(empty($_POST['email']))
    {
        array_push($errors,'Email is required');
    }
    if(empty($_POST['password']))
    {
        array_push($errors,'Password is required');
    }
    if(!empty($_POST['password']) && strlen($_POST['password'])<8)
    {
        array_push($errors,'Password must contain at least 8 characters');
    }
    if(empty($_POST['passwordConfirmation']))
    {
        array_push($errors,'Please repeat your password');
    }
    if( !empty($_POST['password']) && !empty($_POST['passwordConfirmation']) && $_POST['passwordConfirmation']!==$_POST['password'])
    {
        array_push($errors,'Passwords do not match');
    }
    if(count($errors)===0)
    {
        echo "EMAIL TO CHECK:" .$_POST['email'];
        if(checkEmailExists($_POST['email']))
        {
            array_push($errors,'User with same email already exists');
        }
        else
            {
                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                if(createUser($_POST['username'],strtolower($_POST['email']), $hashed_password))
                {
                    $_SESSION['id']=getUserByEmail($_POST['email'])['id'];
                    header('location: dashboard.php');
                }
                else{
                        array_push($errors,'db inserting error');
                    }
            }
    }
}
/**
 * method to verify inputs of new.php where user can create a new blog post with image.
 * @return string error or success message after creating/adding the post with images (if exists) to the database.
 */
function verifyForm()
{
    //Form input checks:
    $target_dir= "uploads/";
    $userId=$_SESSION['id'];

    $formOk=1;
    if(empty($_POST['title']))
    {
        $formOk=0;
        return "<script type='text/javascript'>swal({title: 'Title is required', icon:'error'});</script>";
    }
    if(strlen($_POST['title'])>60)
    {
        $formOk=0;
        return "<script type='text/javascript'>swal({title: 'Title is too big',text:'Maximum number of characters: 60', icon:'error'});</script>";
    }
    if(empty($_POST['content']))
    {
        $formOk=0;
        return "<script type='text/javascript'>swal({title: 'Content is required',text:'Posts without content are not allowed', icon:'error'});</script>";
    }


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
            $uploadOk=0;
            return "<script type='text/javascript'>swal({title: 'File Already exists', icon:'error'});</script>";

        }

        //Check File Size <2 mb
        if($_FILES["fileToUpload"]["size"]> 2000000 )
        {
            $uploadOk=0;

            return "<script type='text/javascript'>swal({title: 'File is too large',text:'Maximum file size: 2 MB ', icon:'error'});</script>";
        }

        //Check file format
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
        {
            $uploadOk=0;
            return "<script type='text/javascript'>swal({title: 'File format error',text:'only JPG, JPEG, PNG files are allowed ', icon:'error'});</script>";
        }
        if($uploadOk==1)
        {
//            $target_file=$target_dir. $_POST['title']."-".$_FILES["fileToUpload"]["name"];
            $target_file=$target_dir."user".$author_id."-".str_replace(' ', '-', $_POST['title']).'.'.$imageFileType;
            if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
            {
                $image= $target_file;
            }
            else{
                return "<script type='text/javascript'>swal({title: 'Error in uploading file to server', icon:'error'});</script>";
            }
        }
    }else{
        $image='images/placeholder.jpg';
    }
    if($uploadOk== 1&& $formOk==1)
    {
        $published=(isset($_POST['published']))? 1: 0;
        if(addNewPost($_POST['title'],$_POST['content'],$_POST['category'],$author_id,$image,$published))
        {
//                   If input is saved then pop a SweetAlert alert then redirect to dashboard.php (PRG 'POST/RETURN/GET' pattern)
            echo "<script type='text/javascript'>";
            echo "swal({title: 'Saved', icon:'success'}).then(function(){window.location.href='dashboard.php';});";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>swal({title: 'Error saving your post', icon:'error'});</script>";
        }
    }
}

/**
 * Method similar to verifyForm, the difference is that it is used on edit.php where user can edit an existing blog post.
 * @param $postId id of the post to be edited/modified.
 * @param $postImage path of the existing image to be deleted/modified/kept.
 * @return string
 */
function editPost($postId,$postImage)
{
    //Form input checks:
    $target_dir= "uploads/";
    $userId=$_SESSION['id'];

    $formOk=1;
    if(empty($_POST['title']))
    {
        $formOk=0;
        return "<script type='text/javascript'>swal({title: 'Title is required', icon:'error'});</script>";
    }
    if(strlen($_POST['title'])>60)
    {
        $formOk=0;
        return "<script type='text/javascript'>swal({title: 'Title is too big',text:'Maximum number of characters: 60', icon:'error'});</script>";
    }
    if(empty($_POST['content']))
    {
        $formOk=0;
        return "<script type='text/javascript'>swal({title: 'Content is required',text:'Posts without content are not allowed', icon:'error'});</script>";
    }


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
            $uploadOk=0;
            return "<script type='text/javascript'>swal({title: 'File Already exists', icon:'error'});</script>";

        }

        //Check File Size <2 mb
        if($_FILES["fileToUpload"]["size"]> 2000000 )
        {
            $uploadOk=0;

            return "<script type='text/javascript'>swal({title: 'File is too large',text:'Maximum file size: 2 MB ', icon:'error'});</script>";
        }

        //Check file format
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
        {
            $uploadOk=0;
            return "<script type='text/javascript'>swal({title: 'File format error',text:'only JPG, JPEG, PNG files are allowed ', icon:'error'});</script>";
        }
        if($uploadOk==1)
        {
            unlink($postImage);
//            $target_file=$target_dir. $_POST['title']."-".$_FILES["fileToUpload"]["name"];
            $target_file=$target_dir."user".$author_id."-". str_replace(' ', '-', $_POST['title']).'.'.$imageFileType;
            if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
            {
                $image= $target_file;
            }
            else{
                return "<script type='text/javascript'>swal({title: 'Error in uploading file to server', icon:'error'});</script>";
            }
        }
    }else{
        $image=$postImage;
    }
    if($uploadOk== 1&& $formOk==1)
        $published=(isset($_POST['published']))? 1: 0;
    if(updatePost($postId,$_POST['title'],$_POST['content'],$_POST['category'],$image,$published))
        {
//                  If input is saved then pop a SweetAlert alert then redirect to dashboard.php (PRG 'POST/RETURN/GET' pattern)
            echo "<script type='text/javascript'>";
            echo "swal({title: 'Saved', icon:'success'}).then(function(){window.location.href='dashboard.php';});";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>swal({title: 'Error saving your post', icon:'error'});</script>";
        }
}

/**
 * Method to remove a post image directly from database.
 * @param $postId int the post that its image must be deleted.
 * @return bool true on success.
 */
function deleteImage($postId)
{
    $post=selectOneRecord($postId);
    unlink($post['image']);
    if(replacePostImage($postId,'images/placeholder.jpg'))
    {
        return true;
    }
    else
    {
        return false;
    }
}

