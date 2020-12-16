<?php 

include "connection.php";

session_start();

class Message
{

    public $user_id;
    public $message;

    function __construct($user_id, $message) 
    {

        $this->user_id = $user_id;
        $this->message = $message;

    }
    //check if the message is valid
    function check_message()
    {
        if(strlen($this->message) == 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    //this function add message in table
    function add_message($conn)
    {
        if($_SESSION['id'] == "")
        {
            echo "the user must be logged in";
        }
        else
        {
        $sql = "INSERT INTO messages (message, time_send, id_user) values ('$this->message', current_time(), '$this->user_id');";
        $data = mysqli_query($conn , $sql);
        }
    }

    
}
