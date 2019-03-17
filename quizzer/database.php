<?php
// Create connection credentials
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "quizer";

// Create mysqli object
$co = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Error handler
if($co->connect_error) {
    printf("Connection failed: %s\n", $co->connect_error);
    exit();
}