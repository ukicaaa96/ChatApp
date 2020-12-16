<?php

include "connection.php";

class User {

   
    public $password;
    public $mail;
    public $username;
  
    function __construct($mail, $password)
    {
        $this->password = $password;
        $this->mail = $mail;
    }
    //this function check login data
    function validate_data_login($conn)
    {

        if (!filter_var($this->mail, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
        else
        {
            $sql = "select * from users where email = '". $this->mail."';";
            $data = mysqli_query($conn , $sql);
            $row_cnt = mysqli_num_rows($data);
            
            if ($row_cnt == 1)
            {
                $row = $data -> fetch_array(MYSQLI_ASSOC);
                $id =  $row["user_id"];
                $username = $row["username"];
                
                
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $this->mail;
              
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    //this function check registration data
    function validate_data_registration($conn,$username)
    {
        $this->username = $username;
        if (!filter_var($this->mail, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
        else
        {
            $sql = "SELECT * FROM users WHERE username = '$this->username' OR email = '$this->mail';";
            $data = mysqli_query($conn , $sql);

            $row_cnt = mysqli_num_rows($data);

            if ($row_cnt == 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }   
    }

    //this function create new user in database
    function create_user($conn)
    {
        $salt="stringforsalt";   
        $pas = $this->password.$salt;
        $pas = sha1($pas,true);

        $sql = "INSERT INTO users (username , email, pass) VALUES ('$this->username' , '$this->mail', '$pas');";
        $data = mysqli_query($conn , $sql);
        return true;
    }

    //this function checks user login data
    function login($conn)
    {    
        $sql = "select pass from users where email = '$this->mail';";

        $data = mysqli_query($conn , $sql);

        $row = $data -> fetch_array(MYSQLI_ASSOC);
        $userpass =  $row["pass"];
     
        $salt="stringforsalt";
        $pas = $this->password.$salt;
        $pas = sha1($pas, true);

        if($pas == $userpass)
        {
            return true;
        } 
        else
        {
            return false;
        }
    }

    //this function check if user have permission for chat
    function check_allow($conn)
    {
        $sql = "select allow from users where email = '$this->mail';";
        $data = mysqli_query($conn , $sql);
        $row = $data -> fetch_array(MYSQLI_ASSOC);

        $allow =  $row["allow"];

        if($allow == "yes")
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}


?>