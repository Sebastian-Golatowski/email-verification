<?php
include_once 'db/connect.php';
$code = $_GET['code'];
$query = "SELECT * FROM user WHERE act_str='".$code."' AND act=0";
$run = $mysqli->query($query) or die($mysqli->error);
$user = mysqli_num_rows($run);
if($user ==1){
    $query="UPDATE `user` SET `act`='1' WHERE act_str='".$code."' AND act=0";
    $run = $mysqli->query($query) or die($mysqli->error);
    echo"account successfully verified";
}
else{
    echo"something went wrong";
}


?>