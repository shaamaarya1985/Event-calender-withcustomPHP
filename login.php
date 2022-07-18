<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
      include("db_connect.php");   
   
      $usernamesignup = mysqli_real_escape_string($conn,$_POST['usernamesignup']);
      $emailsignup = mysqli_real_escape_string($conn,$_POST['emailsignup']); 
      $passwordsignup = mysqli_real_escape_string($conn,$_POST['passwordsignup']); 
      
      $sql = "INSERT INTO superadmin (username, password, email)VALUES ('$usernamesignup', '$passwordsignup', '$emailsignup')";	
      if (mysqli_query($conn, $sql))  {
         //$_SESSION['login_user'] = $usernamesignup;
         //echo "<script>window.location.href = 'index.php';</script>";
         header("location: index.php");
      }else {
         $rerror = "Not Inserted";
      }
	
	 if($_SERVER["REQUEST_METHOD"] == "POST") { 
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM superadmin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
	  $row = mysqli_fetch_array($result);
      
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_COOKIE['login_user'] = $myusername;
		   setcookie('login_user', null, -1, '/');
		 //print_r($_COOKIE);
         echo "<script>window.location.href = 'index.php';</script>";
         //header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
	}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>Login and Registration Form</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis
		.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		
    </head>
    <body>
        <div class="container">
           
            <header>
                <h1>Login and Registration Form</h1>
				
            </header>
            <section>				
                <div id="container_demo" >        
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="" autocomplete="on" method="POST"> 
                                <h1>Log in</h1> 
								<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                                <p> 
                                    <label for="username" class="uname" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                   <a href="http://cookingfoodsworld.blogspot.in/" target="_blank" ></a>
								</p>
								 <p class="signin button"> 
									<input type="submit" value="Login"/> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form action="" method="POST">  
                                <h1> Sign up </h1> 
								<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $rerror; ?></div>
                                <p> 
                                    <label for="usernamesignup" class="uname" >Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail"  > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" >Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" >Please confirm your password </label>
                                    <input id="cpasswordsignup" name="cpasswordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">   
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>