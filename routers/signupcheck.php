<?php
session_start();
$conn=mysqli_connect("localhost","root","","student");
$success=false;
$username = $_POST['username'];
$password = $_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$idno=$_POST['idno'];
$phone=$_POST['phone'];
$regno=$_POST['regno'];
$sql="insert into users(Firstname,Lastname,Regno,IDNO,Phone,username,password) values('$fname','$lname','$regno','$idno','$phone','$username','$password')";
$result = mysqli_query($conn,$sql);
echo $username,$password,$fname,$lname,$idno,$regno;
if($result)
{
echo "<script>location.replace('../index.php?success=1');</script>";
}
else{
    echo "Error".mysqli_error($conn);
}
?>