<?php
<<<<<<< HEAD

$conn = new mysqli("localhost", "root", "", "todolist");
if ($conn->connect_errno) {
    echo $c->connect_errno;
    die();
}
?>
=======
    $conn = new mysqli("localhost", "root","","todolist");
	if($conn->connect_errno) {
		echo $c->connect_errno;
		die();
	}
?>
>>>>>>> 5c94b0ee9abde2431e7296343fd96b09ccd2d457
