<?php
include ('db/sql_query.php');
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