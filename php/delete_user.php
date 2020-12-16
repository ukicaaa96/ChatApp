<?php

include "connection.php";

$email = $_POST['email'];

$sql = "SELECT allow, user_id, email FROM users WHERE email = '$email';";
$data = mysqli_query($conn , $sql);
$row = $data -> fetch_array(MYSQLI_ASSOC);

$user_allow =  $row["allow"];
$user_id = $row["user_id"];
$user_mail = $row["email"];


if($email == $user_mail)
{
    $sql = "UPDATE users SET allow = 'no' WHERE email = '$user_mail' ;";
    $data = mysqli_query($conn , $sql);

    $sql = "DELETE FROM messages WHERE id_user = '$user_id'";
    $data = mysqli_query($conn , $sql);

    echo 'ok';
}

else
{
   echo "nok";
}

    ?>