<?php 
error_reporting(E_ERROR | E_PARSE);
session_start(); 
$id = $_GET['id'];
$token = $_GET['token']; 
include 'db.php' ; 
?>
<html>

<head>
<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	position: center;

}
body {
   background-color: #828282;

}


</style>
</head>
<body>
<table align ="center">
<tr><td>
<div>
<form method="POST"> 
<input type="submit" class="button" name="Go"  value="Verify"  />
</div>
</tr></td> 
</table>
</form>
<body>
<?php
$prompt = ''; 
if ($_POST['Go']) { 
if(isset($_GET['id']) && isset($_GET['token'])) { 
	if 
	 (activate_account($id, $token) == true) 
	{ 
	echo "<script>alert('The verification was succesful');document.location.href = 'profile.php'</script>"; // if succesful
	}
	else 
	{ 
	$prompt = 'Verification unsuccesful'; 
	echo "<script>alert('The verification was unsuccesful');document.location.href = ' ' </script>"; // if failed, need a link !
	}
}
else 
{
$prompt = 'Verification unsuccesful'; 
echo "<script>alert('The verification was unsuccesful');document.location.href = ' ' </script>"; // if failed, need a redirection link!
} 
}
?>

</html>
