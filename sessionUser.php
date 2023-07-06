<?php
session_start();
if(isset($_SESSION['login']))
{
    if($_SESSION['role']=='visitor')
    {

    }
    else{
        header("location:index.php");
    }
}
else{
    header("location:index.php");
}