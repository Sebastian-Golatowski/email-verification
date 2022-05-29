<?php
// $dbHostName= "localhost";
// $dbHostUser="root";
// $dbHostPasswd="";
// $dbName="";

$dbHostName= "sql4.5v.pl";
$dbHostUser="imtelligent9190_simple-email-ver";
$dbHostPasswd="hem60z2w65";
$dbName="imtelligent9190_simple-email-ver";
$mysqli = mysqli_connect($dbHostName,$dbHostUser,$dbHostPasswd,$dbName) or die($mysqli->connect_error);
$query="CREATE DATABASE IF NOT EXISTS rejestracja DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;";
$run = $mysqli->query($query);

$query="USE rejestracja;";
$run = $mysqli->query($query);

$query="CREATE TABLE user (
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    `user_name` varchar(255) NOT NULL,
    gender varchar(1) NOT NULL,
    `name` varchar(255) NOT NULL,
    last_name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    pass varchar(255) NOT NULL,
    act int(1),
    act_str text NOT NULL
);";

$run = $mysqli->query($query);