<?php
session_start();
include_once "db/connect.php";
$len =0;
$problem = 0;
$spec_char=" !#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
if ($_POST["pass"]==$_POST["pass2"]) {
    $password = password_hash("pass",PASSWORD_DEFAULT);
}
else{
    $problem+=1;
    $_SESSION["error"]="hasła nie są takie same";
    header("Location: index.php");
}
if(preg_match_all('/[@]/', $_POST["email"])==0){
    $problem+=1;
    $_SESSION["error"]="not an email";
    header("Location: index.php");
}

if(preg_match_all('/[\x21-\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]/',$_POST['pass'])==0){
    $problem+=1;
    $_SESSION["error"]="no special character";
    header("Location: index.php");
}
if(preg_match_all('/[0-9]/',$_POST["pass"])==0){
    $problem+=1;
    $_SESSION["error"]="no number";
    header("Location: index.php");
}
if(preg_match_all('/[a-z]/',$_POST["pass"])==0){
    $problem+=1;
    $_SESSION["error"]="no small letter";
    header("Location: index.php");
}
if(preg_match_all('/[A-Z]/',$_POST["pass"])==0){
    $problem+=1;
    $_SESSION["error"]="no big letter";
    header("Location: index.php");
}

if(preg_match_all('/[^A-Z\p{L}]/i',$_POST["name"])){
    $problem+=1;
    $_SESSION["error"]="strange character in name";
    header("Location: index.php");
}
if(preg_match_all('/[^A-Z\p{L}]/i',$_POST["last_name"])){
    $problem+=1;
    $_SESSION["error"]="strange character in name last name";
    header("Location: index.php");
}


if($problem==0){
    $email = $_POST["email"];
  
    $verificationCode = md5(uniqid("weryfikacyjnyteksttako", true));

    $verificationLink = "https://simple-email-ver.5v.pl/ver.php?code=". $verificationCode;

    $htmlStr = "";
    $htmlStr .= "hello " . $email . ",<br /><br />";

    $htmlStr .= "if you want to veryfy your account press  ";
    $htmlStr .= "<a href='{$verificationLink}'>here</a>";

    $name = "idk";
    $email_sender = "no-reply@test.com";
    $subject = "emial ver";
    
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: ja \n";

    $body = $htmlStr;

    $_SESSION["ok"]="your verification link was sent to this email address: ".$email;
    mail($email, $subject, $body, $headers);
    
    $query="INSERT INTO `user`(`id`, `user_name`, `gender`, `name`, `last_name`, `email`, `pass`, `act`, `act_str`) VAlUES
    ('NULL','".$_POST['user_name']."','".$_POST['gender']."','".$_POST["name"]."','".$_POST["last_name"]."','".$_POST["email"]."','".$password."','0','".$verificationCode."')";
    $mysqli->query($query);
    
    
    header("Location: index.php");
    
    
}

?>