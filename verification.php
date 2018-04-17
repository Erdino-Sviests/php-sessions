<?php 
session_start(); 
//$id = $_SESSION['id'];
$funkcija = null ; 
?>
<html> 
<form method="POST"> 
<input type="submit" name="Go" value="verify" /> 
</form>



<?php
$prompt = ''; 
if ($_POST['Go']) { 
	if 
	 ($funkcija != null ) 
	{ 
	echo '<script>window.location.href = " "</script>'; // if succesful
} 
else { 
$prompt = 'Verification unsuccesful'; 
echo "<script>alert('The verification was unsuccesful');document.location.href = ' ' </script>"; // if failed
}
}
?>
</html>