<?php 
include "message_class.php";
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST')
 {
    $msg = $_POST['message'];
    $id = $_SESSION['id']; 

    $message = new Message($id, $msg);

    if($message->check_message() == true)
    {
        $message->add_message($conn);
    }
    else
    {
        echo "nok";
    }
}
else
{        
        $messages = $conn -> query("SELECT users.username, messages.message, messages.time_send from messages INNER JOIN users ON users.user_id = messages.id_user;");
        
        while ($row = $messages->fetch_assoc())
        {
            echo $row['username'] . ":".$row['message'] . " : " . $row['time_send'];
            echo "<br>";           
        } 
}

?>