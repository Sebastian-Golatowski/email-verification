<?php
$dbHostName= "sql4.5v.pl";
$dbHostUser="imtelligent9190_simple-email-ver";
$dbHostPasswd="hem60z2w65";
$dbName="imtelligent9190_simple-email-ver";

// $dbHostName= "localhost";
// $dbHostUser="root";
// $dbHostPasswd="";
// $dbName="rejestracja";
$mysqli = mysqli_connect($dbHostName,$dbHostUser,$dbHostPasswd,$dbName) or die("nie działa");
if($mysqli->connect_error){
    printf("connect failed: %s\n",$mysqli->connect_error);
    exit();
}
?>