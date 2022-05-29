<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="to_base.php">
        <p>user name</p>
        <input type="text" name="user_name" required="True"><br>
        <p>password (one big letter, one small letter, one special character)</p>
        <input type="password" name="pass" required="True"><br>
        <p>repeat password</p>
        <input type="password" name="pass2" required="True"><br>
        <p>name</p>
        <input type="text" name="name" required="True"><br>
        <p>last name</p>
        <input type="text" name="last_name" required="True"><br>
        <p>email</p>
        <input type="text" name="email" required="True"><br><!--  można też dać type = email i html sam sprawdzi czy jest @ -->
        <p>gender</p>
        <input type="radio" name="gender" value="W" required="True"> Kobieta<br>
        <input type="radio" name="gender" value="M"> Mężczyzna<br>
        <input type="submit" name="submit" value="poszlo">

        
    </form>
    <?php
        if(isset($_SESSION['error'])){
            echo "<p style='color: red;'>".$_SESSION['error']."</p>";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['ok'])){
            echo "<p style='color: green;'>".$_SESSION['ok']."</p>";
            unset($_SESSION['ok']);
        }
    ?>
</body>
</html>
