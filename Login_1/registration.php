
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h1><center>Registration</center></h1>
	
    <div class="form-item">
		<input type="text" name="username" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="password" required="required" placeholder="Password" required></input>
    </div>
   
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="submit" value="Register"></input>
    </div>
  </form>
<?php
	require('dbcon.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

        $query = "INSERT into `users` (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='reminder'><center><h2>You are registered successfully.</h2><br/><h4>Click here to <a href='index.php'>LOGIN</h4></center></a></div>";
        }
    }else{
?>
</div>
<?php } ?>
</body>
</html>
