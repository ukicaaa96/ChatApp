<?php
include "user_class.php";
include "connection.php";

    $pass = $_POST['password'];
    $email = $_POST['email'];

        $person = new User($email, $pass);

        if($person->validate_data_login($conn) == true)
        {
            if($person->login($conn) == true)
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
