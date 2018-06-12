 <!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
.success{color:#00FF00;}
h2{
	text-align: center;
	color: red;
}
h3{
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
   $emailErr=$emp_codeErr="";
   @require "out_menu.php";
// define variables and set to empty values
$emp_codeErr = $emp_nameErr = $emailErr =$genderErr= $HRAErr = $DAErr = $TAErr= $loanErr= $ab_daysErr= $date_joiningerr= $bonusErr=$salaryErr= "";
$emp_code = $emp_name = $email = $gender =$HRA=$DA=$TA=$loan=$ab_days=$date_joining= $address = $bonus=$salary = "";
$date_joiningErr= $addressErr ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["emp_code"])) {
     $emp_codeErr = "employee code is required";
   } else {
     $emp_code = test_input($_POST["emp_code"]);
   }
   if (empty($_POST["emp_name"])) {
     $emp_nameErr = "Name is required";
   } else {
     $emp_name = test_input($_POST["emp_name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$emp_name)) {
       $emp_nameErr = "Only letters and white space allowed"; 
     }
   }
   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
   if (empty($_POST["loan"])) {
     $loan = 0;
   } else {
     $loan = test_input($_POST["loan"]);
   }
   if (empty($_POST["ab_days"])) {
     $ab_days = 0;
   } else {
     $ab_days = test_input($_POST["ab_days"]);
   }
   if (empty($_POST["date_joining"])) {
     $date_joiningErr = "date of joining is required";
   } else {
     $date_joining = test_input($_POST["date_joining"]);
   }
   if (empty($_POST["address"])) {
     $addressErr = "This field is required";
   } else {
     $address = test_input($_POST["address"]);
   }
   if (empty($_POST["bonus"])) {
     $bonus = 0;
   } else {
     $bonus = test_input($_POST["bonus"]);
   }
   if (empty($_POST["salary"])) {
     $salaryErr = "This field is required";
   } else {
     $salary = test_input($_POST["salary"]);
   }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(!empty($_POST["emp_code"])&&!empty($_POST["emp_name"])&&!empty($_POST["email"])&&!empty($_POST["gender"])
	   &&!empty($_POST["date_joining"])&&!empty($_POST["address"])&&!empty($_POST["salary"])){
	   include 'connect.php';
$sql = "SELECT * FROM `employee` WHERE `emp-code`='$emp_code'";
$result = $conn->query($sql);
	    if ($result->num_rows > 0) {
       $emp_codeErr="Employee with this code already exists ";
     }else{
	   $HRA=($salary)/(10);
	   $DA=($salary)/(20);
	   $TA=($salary)/(30);
	   $sql="INSERT INTO `employee`(`emp-code`, `emp-name`, `email`, `gender`, `HRA`, 
	   `DA`, `TA`, `loan`, `ab-days`, `date-joining`, `address`, `bonus`, `salary`) 
	   VALUES ('$emp_code','$emp_name','$email','$gender','$HRA','$DA','$TA',
	   '$loan','$ab_days','$date_joining','$address','$bonus','$salary')";
	   if ($conn->query($sql) === TRUE) {
         echo   '<span class="success">"New record created successfully"</span>';
		  
    } else {
            echo '<span class="error"> "Error: " . $sql . "<br>" . $conn->error</span>'; 
    }
	$conn->close();
		 header('Refresh: 2; URL = out_menu.php');
	 }

         
   }}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<body> 
<p><span class="error">* required field.</span></p>
<h2>Fill the following details of the employee <br></h2>
<h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   EmployeeCode: <input type="int" name="emp_code" value="<?php echo $emp_code;?>"><span class="error">* <?php echo  $emp_codeErr;?></span>
   <br><br>
   Name: <input type="text" name="emp_name" value="<?php echo $emp_name;?>"><span class="error">* <?php echo  $emp_nameErr;?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email;?>"><span class="error">* <?php echo  $emailErr;?></span>
   <br><br>
    Gender:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
   <span class="error">* <?php echo  $genderErr;?></span><br><br>
   LOAN: <input type="int" name="loan" value="<?php echo $loan;?>">
   <br><br>
   NO.of.Days Absent: <input type="int" name="ab_days" value="<?php echo $ab_days;?>">
   <br><br>
   Date of joining: <input type="text" name="date_joining" value="<?php echo $date_joining;?>">
   <span class="error">* <?php echo  $date_joiningErr;?></span><br><br>
   <br><br>
   Address: <textarea name="address" rows="5" cols="40"><?php echo $address;?></textarea>
   <span class="error">* <?php echo  $addressErr;?></span><br><br><br>
   Bonus: <input type="int" name="bonus" value="<?php echo $bonus;?>">
   <br><br>
   Salary: <input type="int" name="salary" value="<?php echo $salary;?>">
   <span class="error">* <?php echo  $salaryErr;?></span><br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
</h3>
</body>
</html>
 