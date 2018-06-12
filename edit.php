 <!DOCTYPE HTML> 
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
</style>
</head>
<body> 

<?php
   ob_start();
   session_start();
   if(!isset($_SESSION["username"])||!isset($_SESSION["password"])){
	   header('Refresh: 0; URL = http://localhost/project/login.php');
   }
   @require "out_menu.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(!empty($_POST["emp_code"])){
	   $emp_code = test_input($_POST["emp_code"]);
	   require "connect.php";
	   $sql = "SELECT * FROM `employee` WHERE `emp-code`='$emp_code'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $emp_code = $row['emp-code'];
$emp_name = $row['emp-name'];
$email = $row['email'];
$gender = $row['gender'];
$loan = $row['loan'];
$ab_days = $row['ab-days'];
$date_joining = $row['date-joining'];
$address = $row['address'];
$bonus = $row['bonus'];
$salary = $row['salary'];
include "editas.php";
    }
} else {
    echo "0 results";
   }}
   
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  Enter the EmployeeCode you want to edit: <input type="int" name="emp_code">
   <br><br>
   <input type="submit" name="submit" value="submit">
   </form></h2>
</body>
</html>
 