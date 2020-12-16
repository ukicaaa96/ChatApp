<?php

$HOST = 'localhost';
$USER = 'root';
$PASSWORD = 'meksabrate';
$DATABASE = 'mychat';

$conn = new mysqli($HOST,$USER,$PASSWORD,$DATABASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

?>