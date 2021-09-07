<?php 
  	header("Access-Control-Allow-Origin: *");
	include "bcrypt.php";
	include "conn.php";

	$email = isset($_POST['email']) ? $_POST['email'] : die();
	$password = isset($_POST['password']) ? $_POST['password'] : die();
    date_default_timezone_set("Asia/Jakarta");
    $updated_at = date('Y-m-d H:i:s');

	$sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0) {
        $bcrypt = new Bcrypt(16);
        $password = $bcrypt->hash($password);

        $sql = "UPDATE users SET password = ?, updated_at = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $password, $updated_at, $email);
        $stmt->execute();

        if ($stmt->affected_rows >= 0) {
            echo json_encode([
                "status" => true,
                "message" => "Password changed!",
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Failed!",
            ]);
        }
	} else{
		echo json_encode([
            "status" => false,
            "message" => "Failed! Email not found!",
        ]);
	}

	$conn->close();
?>