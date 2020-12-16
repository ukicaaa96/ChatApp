<?php
include "connection.php";

$email = $_POST['email'];

$sql = "UPDATE users SET allow = 'yes' WHERE email = '$email' ;";
$data = mysqli_query($conn , $sql);

$sql = "SELECT allow FROM users WHERE email = '$email';";
$data = mysqli_query($conn , $sql);
$row = $data -> fetch_array(MYSQLI_ASSOC);
$allow =  $row["allow"];

    if($allow == "yes")
    {
        echo "ok";
    }
    else
    {
        echo "nok";
    }



?>