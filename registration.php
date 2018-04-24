<?php
include 'db.php';
if (isset($_Post['submit'])) {
    $succes = "";
    $error  = "";
    if ($_Post['id'] != "") { //Pārbauda vai lietotājvārds nav tukš.
        if ($_Post['password1'] != "") { //Pārbauda vai parole nav tukša
            if ($_Post['password2'] != "") { //Pārbauda vai atkartotā parole nav tukša
                if ($_Post['password1'] == $_Post['password2']) { //Salīdzina paroli ar atkārtoto paroli
                    register('register', $_Post['id'], $_Post['password1']); //Izsauc funkciju, kas ieraksta datu bāzē lietotajvārdu un paroli
                    $succes = "Registration has been succesful. You must varify your registration by activating link which we have sent to your email."; //Izvada virs formas, ka reģistrācija ir notikus. Izvada tajā pašā vietā, kur error(Vismaz orģinālaja kodā)
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
<body>
    <h1>Register</h1>
    <p><?php
echo $error;
?></p>
    <form id="regform" method="post" action="">
        <p>Username:<input type="text" name="id" required="required" /></p>
        <p>Password:<input type="password" name="password1" required="required" /></p>
        <p>Password:<input type="password" name="password2" required="required" /></p>
        <input type="submit" name="submit" value="Login"/>
    </form>
</body>
</html> 
 Formatting took: 81 ms 
PHP Formatter made by Spark Labs  
Copyright Gerben van Veenendaal   
