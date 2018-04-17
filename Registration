<?php
if ($_Post['id'] != "") { //Pārbauda vai lietotājvārds nav tukš.
    if ($_Post['password1'] != "") { //Pārbauda vai parole nav tukša
        if ($_Post['password2'] != "") { //Pārbauda vai atkartotā parole nav tukša
            if ($_Post['password1'] == $_Post['password2']) { //Salīdzina paroli ar atkārtoto paroli
                call_user_func('register', $_Post['id'], $_Post['password1']); //Izsauc funkciju, kas ieraksta datu bāzē lietotajvārdu un paroli
                Echo "You have been registered";
            } else {
                echo "Passwords  do not match!";
            }
        } Else {
            Echo "Repeated password is empty";
        }
    } else {
        Echo "Password is empty!";
    }
} else {
    echo "User name is empty";
} //Tālāk seko vienkārš html formas paraugs
?>
<html lang="en">  
<body>
    <h1>Registration</h1>
    <form id="regform" method="post" action="">
        <p>Username:<input type="text" name="id" required="required" /></p>
        <p>Password:<input type="password" name="password1" required="required" /></p>
		<p>Password:<input type="password" name="password2" required="required" /></p>
        <input type="submit" value="Login"/>
    </form>
</body>
</html>
