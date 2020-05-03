<?php
include ('db/sql_query.php');
if(isset($_GET['delete']))
{
    deletPost($_GET['delete']);
    header('location: dashboard.php');
}
if(isset($_GET['id']))
{
    echo "Post to edit: ". $_GET['id'];
}
