<?php 
  	header("Access-Control-Allow-Origin: *");
	include "bcrypt.php";
	include "conn.php";

    if (isset($_POST['email'])){
        $email = $_POST['email'];
    }else{
        header("HTTP/1.1 209 No email Param");
        die();
    }
	if (isset($_POST['password'])){
        $password = $_POST['password'];
	} else{
	    header("HTTP/1.1 209 No password Param");
	    die();
	}
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
            header("HTTP/1.1 210 Failed");
            echo json_encode([
                "status" => false,
                "message" => "Failed!",
            ]);
        }
	} else{
        header("HTTP/1.1 210 Failed");
		echo json_encode([
            "status" => false,
            "message" => "Failed! Email not found!",
        ]);
	}

	$conn->close();
?>