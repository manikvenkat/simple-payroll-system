<!DOCTYPE html>
<html>
<head>
<style>
h2{
	border-style: solid;
	border-color: #000000;
	text-align: center;
	margin-top: 50px;
     margin-bottom: 50px;
     margin-right: 150px;
     margin-left: 150px;
	  padding-top: 100px;
     padding-right: 50px;
     padding-bottom: 100px;
     padding-left: 50px;
}
#table{
   margin-top:30px;
   }
</style>
</head>
<?php
ob_start();
   session_start();
   if(!isset($_SESSION["username"])||!isset($_SESSION["password"])){
	   header('Refresh: 0; URL = http://localhost/project/login.php');
   }
   @require "out_menu.php";
require 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (!empty($_POST["emp_name"])) {
    $emp_name = test_input($_POST["emp_name"]);
include 'connect.php';
$sql = "SELECT * FROM `employee` WHERE `emp-name`='$emp_name'";
$result = $conn->query($sql);

?>
<body>
<div id='table'><br>
<table style="width:99.9%"border="5">
<tr>
<th>Employee-code</th>
<th>Name</th>
<th>Email</th>
<th>Gender</th>
<th>HRA</th>
<th>DA</th>
<th>TA</th>
<th>Loan</th>
<th>no.of days absent</th>
<th>Date of joining</th>
<th>Address</th>
<th>Bonus</th>
<th>Salary</th>
</tr>
<?php

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $emp_code = $row['emp-code'];
$emp_name = $row['emp-name'];
$email = $row['email'];
$gender = $row['gender'];
$HRA = $row['HRA'];
$DA = $row['DA'];
$TA = $row['TA'];
$loan = $row['loan'];
$ab_days = $row['ab-days'];
$date_joining = $row['date-joining'];
$address = $row['address'];
$bonus = $row['bonus'];
$salary = $row['salary'];
echo '<tr>';
echo "<td>$emp_code</td>";
echo "<td>$emp_name</td>";
echo "<td>$email</td>";
echo "<td>$gender</td>";
echo "<td>$HRA</td>";
echo "<td>$DA</td>";
echo "<td>$TA</td>";
echo "<td>$loan</td>";
echo "<td>$ab_days</td>";
echo "<td>$date_joining</td>";
echo "<td>$address</td>";
echo "<td>$bonus</td>";
echo "<td>$salary</td>";
echo '</tr>';
    }
} else {
    echo "0 results";
}
$conn->close();}}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
</table>
</div>
<h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Employee Name: <input type="varchar" name="emp_name">
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form></h2>
</body>
</html>
