<?php

$conn = new mysqli("localhost", "root", "", "todolist");
if ($conn->connect_errno) {
    echo $c->connect_errno;
    die();
}
?>
