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
$emp_code="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (!empty($_POST["emp_name"])) {
    $emp_name = test_input($_POST["emp_name"]);
	require "connect.php";
	// sql to delete a record
 $sql = "DELETE FROM `employee` WHERE `emp-name`='$emp_name'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
		 header('Refresh: 2; URL = out_menu.php');
   } else {
    echo "enter the empty field";
   } 
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
   Employee Name: <input type="varchar" name="emp_name">
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form></h2>
</body>
</html>
 