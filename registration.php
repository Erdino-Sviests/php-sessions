<?php
include 'db.php';
$succes = "";
$error  = "";
if (isset($_POST['submit'])) { //Pārbauda vai nospiest poga, lai ievadītu datus
    $succes = "";
    $error  = "";
    if ($_POST['id'] != "") { //Pārbauda vai lietotājvārds nav tukš.
        if ($_POST['password1'] != "") { //Pārbauda vai parole nav tukša
            if ($_POST['password2'] != "") { //Pārbauda vai atkartotā parole nav tukša
                if ($_POST['password1'] == $_POST['password2']) { //Salīdzina paroli ar atkārtoto paroli
                    register($_POST['id'], $_POST['password1']); //Izsauc funkciju, kas ieraksta datu bāzē lietotajvārdu un paroli
                    $succes = "Registration has been successful. You must verify your registration by activating link which we have sent to your email."; //Izvada virs formas, ka reģistrācija ir notikus. Izvada tajā pašā vietā, kur error(Vismaz orģinālaja kodā)
                } else {
                    $error = "Passwords  do not match!";
                }
            } Else {
                $error = "Repeated password is empty";
            }
        } else {
            $error = "Password is empty!";
        }
    } else {
        $error = "User name is empty";
    }
} //Tālāk seko html formas paraugs (nev tas, ko izmantosim)
?>
<html lang="en">  
<body style="
    display: flex;
	background-color:#E7EAF4;
">
    <form id="regform" method="post" action="" style="
    margin: auto;
    height:250px;
    width:275px;
    text-align: center;
    background-color: lightgrey;
    box-shadow:0px 0px 0px 8px black inset;
    "
>
	    <h1>Register</h1>
    <p><?php
	echo $error;
	echo $succes;
	?></p>
        <p>Username:<input type="text" name="id" required="required" style=" background-color:#69E1AD"/></p>
        <p>Password:<input type="password" name="password1" required="required" style=" background-color:#69E1AD" /></p>
        <p>Password:<input type="password" name="password2" required="required" style=" background-color:#69E1AD"/></p>
        <input type="submit" name="submit" value="Login"/>
    </form>
</body>
</html>
