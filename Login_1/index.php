<?php require('dbcon.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h1><center>Welcome</center></h1>
	
    <div class="form-item">
		<input type="text" name="username" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="password" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
<?php 
	require('dbcon.php'); 
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: home.php"); // Redirect user to home.php
            }else{
				echo "<div class='reminder'><center><h2>Username/password is incorrect.</h2><br/><h4>Not a member? <a href='registration.php'>SIGN UP NOW</h4></center></a></div>";
				}
    }else{
?>
  <div class="reminder">
    <p><a href="registration.php">SINGN UP</a></p>
  </div>
  
</div>
<?php } ?>
</body>
</html>