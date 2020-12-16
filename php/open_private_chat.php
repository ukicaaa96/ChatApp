<?php
include "connection.php";

session_start();

$email = $_POST['email'];

$sql = "select * from users where email = '$email'";
$data = mysqli_query($conn , $sql);
$row = $data -> fetch_array(MYSQLI_ASSOC);
$row_cnt = mysqli_num_rows($data);

if($row_cnt == 0)
{
    echo 'nok';
}
else
{
    $_SESSION['reciver'] = $row['user_id'];
    echo "ok";
}



    















?>
