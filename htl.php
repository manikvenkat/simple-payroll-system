<!DOCTYPE html>
<html>
<head>
<style>
.mess{
	font-size:30px;
	font-style:oblique;
	text-transform: capitalize;
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
   $total=0;
   @require "out_menu.php";
require 'connect.php';
?>
<body>
<div id='table'><br>
<table style="width:99.9%"border="5">
<?php
include 'connect.php';
$sql = "SELECT * FROM employee
ORDER BY salary DESC;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo '<tr>';
echo '<th>Employee-code</th>';
echo '<th>Name</th>';
echo '<th>Email</th>';
echo '<th>Gender</th>';
echo '<th>HRA</th>';
echo '<th>DA</th>';
echo '<th>TA</th>';
echo '<th>Loan</th>';
echo '<th>no.of days absent</th>';
echo '<th>Date of joining</th>';
echo '<th>Address</th>';
echo '<th>Bonus</th>';
echo '<th>Salary</th>';
echo '</tr>';
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
$total+=$salary;
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
echo '<span class="mess">Total amount of basic pay paid by our company to the employees = </span>';
echo "<span class='mess'>$total</span>";
 $conn->close();
?>
</table>
</div>
</body>
</html>
