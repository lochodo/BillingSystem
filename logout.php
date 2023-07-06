<?php
session_destroy();
if(isset($_SESSION['login']))
{

}
else
{
    header("location:index.php");
}
?>