<?php

    $con = new mysqli("localhost","root","","scent_db");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $con->set_charset("utf8");
?>