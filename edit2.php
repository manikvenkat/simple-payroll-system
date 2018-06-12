<html>
<head>
<style>
.error {color: #FF0000;
}
.success{color:#00FF00;
 font-size:20px;}
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
    require "out_menu.php";
   ob_start();
   @session_start();
   if(!isset($_SESSION["username"])||!isset($_SESSION["password"])){
	   header('Refresh: 0; URL = http://localhost/project/login.php');
   }
   $emp_codeErr = $emp_nameErr = $emailErr =$genderErr= $HRAErr = $addressErr=
   $DAErr = $TAErr= $loanErr= $ab_daysErr= $date_joiningErr= $bonusErr=$salaryErr= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["emp_code"])) {
     $emp_codeErr = "employee code is required";
	 $emp_code="";
   } else {
     $emp_code = test_inputs($_POST["emp_code"]);
   }
   if (empty($_POST["emp_name"])) {
     $emp_nameErr = "Name is required";
	 $emp_name="";
   } else {
     $emp_name = test_inputs($_POST["emp_name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$emp_name)) {
       $emp_nameErr = "Only letters and white space allowed"; 
     }
   }
   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_inputs($_POST["gender"]);
   }
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
	 $email="";
   } else {
     $email = test_inputs($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
   if (empty($_POST["loan"])) {
     $loan = 0;
   } else {
     $loan = test_inputs($_POST["loan"]);
   }
   if (empty($_POST["ab_days"])) {
     $ab_days = 0;
   } else {
     $ab_days = test_inputs($_POST["ab_days"]);
   }
   if (empty($_POST["date_joining"])) {
     $date_joiningErr = "date of joining is required";
	 $date_joining="";
   } else {
     $date_joining = test_inputs($_POST["date_joining"]);
   }
   if (empty($_POST["address"])) {
     $addressErr = "This field is required";
	 $address="";
   } else {
     $address = test_inputs($_POST["address"]);
   }
   if (empty($_POST["bonus"])) {
     $bonus = 0;
   } else {
     $bonus = test_inputs($_POST["bonus"]);
   }
   if (empty($_POST["salary"])) {
     $salaryErr = "This field is required";
	 $salary="";
   } else {
     $salary = test_inputs($_POST["salary"]);
   }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(!empty($_POST["emp_code"])&&!empty($_POST["emp_name"])&&!empty($_POST["email"])&&!empty($_POST["gender"])
	   &&!empty($_POST["date_joining"])&&!empty($_POST["address"])&&!empty($_POST["salary"])){
	   include 'connect.php';
	   $HRA=($salary)/(10);
	   $DA=($salary)/(20);
	   $TA=($salary)/(30);
$sql = "UPDATE `employee` SET `email`='$email',`gender`='$gender',
	   `HRA`='$HRA',`DA`='$DA',`TA`='$TA',`loan`='$loan',
	   `ab-days`='$ab_days',`date-joining`='$date_joining',`address`='$address',
	   `bonus`='$bonus',`salary`='$salary' WHERE `emp-code`='$emp_code'";

if ($conn->query($sql) === TRUE) {
    echo   '<span class="success">"record updated succesfully"</span>';
	 
	
} else {
    echo "Error updating record: " . $conn->error;
}
header('Refresh: 2; URL = out_menu.php');
$conn->close();
	 }

         
   }
   function test_inputs($data) {
   $data = trim($data);
   $data = stripslashes($data);
   return $data;
}
?>
 <p><span class="error">* required field.</span></p>
<h2>
 <form method="post" action="edit2.php">   
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
</form></h2>
</body>
</html>
 