 <!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
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
 $emp_codeErr = $emp_nameErr = $emailErr =$genderErr= $HRAErr = $addressErr=
   $DAErr = $TAErr= $loanErr= $ab_daysErr= $date_joiningErr= $bonusErr=$salaryErr= "";?>
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
 