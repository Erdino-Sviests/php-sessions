<?php 
session_start(); 
$id = $_SESSION['id'];
$funkcija = null ; 
include 'db.php' ; 
?>
<html> 
<form method="POST"> 
<input type="submit" name="Go" value="verify" /> 
</form>



<?php
$prompt = ''; 
if ($_POST['Go']) { 
	if 
	 (get_token($id) != null ) 
	{ 
	echo "<script>alert('The verification was succesful');document.location.href = 'profile.php'</script>"; // if succesful
} 
else { 
$prompt = 'Verification unsuccesful'; 
echo "<script>alert('The verification was unsuccesful');document.location.href = ' ' </script>"; // if failed
}
}
?>
</html>
