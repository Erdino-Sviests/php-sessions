<?php 
session_start(); 
$id = $_GET['id'];
$token = $_GET['token']; 
include 'db.php' ; 
?>
<html> 

<table align ="center">
<tr><td>
<input type="submit" name="Go" style="font-size:100pt;color:white;background-color:green;border:5px solid #000000;padding:5px" value="Verify" bgcolor ="" />
</tr></td> 
</table>


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
	echo "<script>alert('The verification was unsuccesful');document.location.href = ' ' </script>"; // if failed
	}
}
else 
{
$prompt = 'Verification unsuccesful'; 
echo "<script>alert('The verification was unsuccesful');document.location.href = ' ' </script>"; // if failed
} 
}
?>
</html>
