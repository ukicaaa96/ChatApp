<?php
include 'connection.php';
session_start();
$user = $_SESSION['username'];

$sql = "select allow from users where username = '$user';";
$data = mysqli_query($conn , $sql);
$row = $data -> fetch_array(MYSQLI_ASSOC);

$allow =  $row["allow"];

if($allow == "yes")
{
    echo 'ok';
}
else
{
    echo "nok";
}

?>