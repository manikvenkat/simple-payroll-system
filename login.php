<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang = "en">
   <h1>You must login first in order to edit profiles of the employees</h2>
   <head>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
	  .time{
	color: #0000FF;
   text-align:center;
   font-size: 1.5em;
}
	  h2{
		  color: green;
		  text-align:center;
		  margin-top:100px;
	  }
	  h1{
		  color: #F0F8FF;
   text-align:center;
   background-color: #FF4500;
   padding: 15px;
   text-decoration: bold;
	  }
	  body{
		  background-color:#FFF8DC;
	  }
	 
       h3{
		   padding-left:100px;
			border:3px solid green;
	background-color: #7CFC00;
	text-align: center;
	height:300px;
	width:350px;
	 margin-top: 50px;
     margin-bottom: 100px;
     margin-right: 100px;
     margin-left: 450px;
}
         
         .form-signin {
            max-width: 330px;
            padding-right:50px;
            margin: 0 auto;
            color: #017572;
			
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
			
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
			
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
			
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
			
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
			
         }
         
         h2{
            color: #017572;
         }
      </style>
      <h2>LOGIN PORTAL</h2>
   </head>
	<h3>
   <body >
  
            <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
               if ($_POST['username'] == 'username' && 
                  $_POST['password'] == 'password') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'username';
				  $_SESSION['password'] ='password';
                  
                  echo 'You have entered valid use name and password';
				   header('Refresh: 0; URL = http://localhost/project/out_menu.php');
               }else {
                  $msg = 'Wrong username or password';
               }
            }
         ?>
		 <h4><span class="time"><?php  include "time.php";     ?></span>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            USERNAME:<input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus><br><br>
            PASSWORD:<input type = "password" class = "form-control"
               name = "password" placeholder = "password" required><br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
         
      </div> 
      </h3>
   </body>
  
</html>