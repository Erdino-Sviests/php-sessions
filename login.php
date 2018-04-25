<?php
include 'db.php';
$error = "";
if (isset($_POST['submit'])) { //Pārbauda vai nospiest poga, lai ievadītu datus
    if (verify_login($_POST['id'], $_POST['password'])) {
        session_start();
        $_SESSION["id"] = $_POST['id'];
        header("Location: /profile.php");
        exit();
    }
    $error = "Incorrect login credentials";
} //Tālāk seko html formas paraugs (nev tas, ko izmantosim)
?>
<html lang="en">
<body style="
    display: flex;
	background-color:#E7EAF4;
">
    <form id="regform" method="post" action="" style="
    margin: auto;
    padding: 1em;
    text-align: center;
    background-color: lightgrey;
    box-shadow:0px 0px 0px 8px black inset;
    "
>
	    <h1>Login</h1>
    <p><?php
echo $error;
?></p>
        <p>Username:<input type="text" name="id" required="required" style=" background-color:#69E1AD"/></p>
        <p>Password:<input type="password" name="password" required="required" style=" background-color:#69E1AD" /></p>
        <input type="submit" name="submit" value="Login"/>
    </form>
</body>
</html>
