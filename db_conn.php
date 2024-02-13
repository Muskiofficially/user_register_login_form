<?php
// connect the database
$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'reg_login_db';

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die('Connection Error: ' . mysqli_connect_error());
}
?>
