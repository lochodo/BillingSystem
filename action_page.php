<?php
$username=$_POST['uname'];
$password=$_POST['psw'];
$userrole=$_POST['role'];
$connection=mysqli_connect("localhost","root","","billing");
$sqlstmt="select * from users where username='$username'and password='$password' and role='$userrole'";
$query=mysqli_query($connection,$sqlstmt);
$count=mysqli_num_rows($query);
echo $count;
if($count==1)
{
    session_start();
    $_SESSION['login']=$username;
    $_SESSION['role']=$userrole;
    header("location:$userrole.php");
}
else
{
    header("location:index.php?error=Wrong password or username");
}
?>