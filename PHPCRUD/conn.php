<?php

    $server = "localhost";
    $username = "root";
    $password = "12345";
    $dbname = "phpcrud";

    $conn = new mysqli($server, $username, $password, $dbname);

    if($conn->connect_error){
        die ("Connection failed" .$conn->connect_error);
    }

?>