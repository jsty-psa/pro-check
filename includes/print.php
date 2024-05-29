<?php
    include_once "connection.php";

    if($_GET['pcn']) {
        $pcn = $_GET['pcn'];
        $sql = "SELECT * FROM registrant_table WHERE pcn = '$pcn'";
        $result = $conn->query($sql);
        
        if($result->num_rows == 1) {
            $result = $result->fetch_assoc();
        }
        else {
            die();
        }
    }
    else {
        die();
    }