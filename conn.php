<?php
$conn = new mysqli("localhost", "root", "", "todolist");
if ($conn->connect_errno) {
    echo $conn->connect_errno;
    die();
}
?>