<?php

include "connection.php";
session_start();

$sender = $_SESSION['id'];
$reciver = $_SESSION['reciver'];
$msg = $_POST['message'];


$sql = "insert into private_chat (sender,reciver,message) values ('$sender','$reciver','$msg');";
$data = mysqli_query($conn , $sql);

?>