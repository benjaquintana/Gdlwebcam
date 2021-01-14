<?php
    $conn = new mysqli('db4free.net', 'elbenjaq', 'hacefrio', 'elbenjaq');

    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }

?>
