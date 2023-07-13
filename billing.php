<?php
//error_reporting(0);
include_once("config.php");
if(isset($_POST['Book']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$office=$_POST['office'];
$date=$_POST['date'];
$user=$_SESSION['login'];
$sql="INSERT INTO  billings(CompanyName,EmailAddress,Date,status,AmountWaterSpent,TotalWaterax,TotalWaterAmount,ElectricityAmountSpent,ElectricityTax,TotalAmountElectricity,TotalAmount) VALUES(:fname,:mobile,:email,:date,:office,:user)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':office',$office,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull. Wait for confirmation');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/slick.css">
<link rel="stylesheet" href="assets/css/banner.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Generate Bills</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" onSubmit="return valid();">
<div class="form-group">
                 <select class="form-control" name="user">
<option>Select user to bill</option>
<?php
$conn=mysqli_connect("localhost","root","","billing");
if($conn)
{
$check="select * from users where role='user'";
$checkquery=mysqli_query($conn,$check);
while($row=mysqli_fetch_assoc($checkquery))
{
echo "<option>".$row['Firstname']."</option>";
}
}
else{
echo "<option>There is connection error</option>";
}
?>
</select>
 </div>
<div class="water" style="border:3px solid black">
<h3>Water Billing</h3>                
<div class="form-group">
                  <input type="text" class="form-control" name="TotalSpentWater" placeholder="Amount Spent" required="required">
                </div>
                      <div class="form-group">
                  <input type="text" class="form-control" name="TotalTaxWater" placeholder="Water Tax" maxlength="10" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="TotalWater" id="emailid" onBlur="checkAvailability()" placeholder="Total Amount" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                </div>
<div class="water" style="border:3px solid black">
<h3>Electricity Billing</h3>                
<div class="form-group">
                  <input type="text" class="form-control" name="TotalSpentElectricity" placeholder="Amount Spent" required="required">
                </div>
                      <div class="form-group">
                  <input type="text" class="form-control" name="TotalTaxElectricity" placeholder="Electricity Tax" maxlength="10" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="TotalElectricity" id="emailid" onBlur="checkAvailability()" placeholder="Total Amount" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                </div>
<div class="form-group">
                  <input type="submit" value="Bill" name="Bill" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
      </div>
    </div>
  </div>
</div>