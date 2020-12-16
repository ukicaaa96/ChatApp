<?php
include "user_class.php";
include "connection.php";

$username = $_POST['username'];
$pass = $_POST['pass'];
$email = $_POST['email'];



$person = new User($email,$pass);


if($person->validate_data_registration($conn, $username) == true)
{
    if($person->create_user($conn) == true)
    {
        echo "ok";
    }
    else
    {
        echo "nok";
    }
}
else
{
    echo "nok";
}




    


















?>