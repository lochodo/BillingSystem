<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #4070f4;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #4070f4;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
.button {
  background-color: #4070f4;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.search{
  padding:10px;
  align-items:center;
}
.search .field{
  width:30%;
  height:30px;
}
.btn{
  width:60px;
  height:30px;
  background:blue;
}
</style>
</head>
<body>
  <form action="" class="search" method="POST">
  <input type="search" class="field" name="reg"><input type="Submit" value="search" class="btn" name="search">
</form>
<table>
<tr>
<th>PROPERTY</th>
<th>VALUE</th>
</tr>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['search']))
{
$email=$_SESSION['login'];
$reg=$_POST['reg'];
$sql = "SELECT * FROM users where Regno='$reg'";
$result =mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {
  // output data of each row
 ?>
    <tr><td>Name:</td><td><?php echo $row['Firstname']." ".$row['Lastname']; ?>
    </td></tr>
    <tr><td>IDNO:</td><td><?php echo $row['IDNO']; ?>
    </td></tr>
    <tr><td>Registration Number:</td><td><?php echo $row['Regno']; ?>
    </td></tr>
    <tr><td>Email:</td><td><?php echo $row['username']; ?>
    </td></tr>
    <?php
} else {
  echo "<b>Student not found in the system</b>";
}
}
$conn->close();
?>
</table>
<center>
<a class="button" href="logout.php">Logout</a>
</center>
</body>
</html>