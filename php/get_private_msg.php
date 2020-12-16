<?php
include "connection.php";
session_start();
$sender = $_SESSION['id'];
$reciver = $_SESSION['reciver'];

$sql = "select * from users where user_id = '$sender'";
$data = mysqli_query($conn , $sql);
$row = $data -> fetch_array(MYSQLI_ASSOC);
$sender_username = $row['username'];

$sql = "select * from users where user_id = '$reciver'";
$data = mysqli_query($conn , $sql);
$row = $data -> fetch_array(MYSQLI_ASSOC);
$reciver_usename = $row['username'];

$messages = $conn -> query("select * from private_chat where (sender = $sender or sender = $reciver) and (reciver = $sender or reciver = $reciver);");

while ($row = $messages->fetch_assoc())
{
    if($row['sender'] == $sender){
        echo $sender_username . " : " . $row['message'];
        echo "<br>";           
    }
    else if($row['sender'] == $reciver)
    {
        echo $reciver_usename . " : " . $row['message'];
        echo "<br>";           
    }
    else
    {
        echo "none";
    }
}

?>