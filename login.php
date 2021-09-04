<?php 
  	header("Access-Control-Allow-Origin: *");
	include "bcrypt.php";
	include "conn.php";

	$email = isset($_POST['email']) ? $_POST['email'] : die();
    $password = isset($_POST['password']) ? $_POST['password'] : die();
    $role = isset($_POST['role']) ? $_POST['role'] : die();
	$res;

	if ($role=='admin'){
		$sql = "SELECT * FROM users WHERE email=? and (role='admin' or role='superadmin')";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$res = $stmt->get_result();
		
	} else if ($role=='user'){
		$sql = "SELECT * FROM users WHERE email=? and role='user'";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$res = $stmt->get_result();
	}

	if($res->num_rows > 0) {
		$row = $res->fetch_assoc();
		function resolve_login($password, $hash) 
		{
			$bcrypt = new Bcrypt(16);
			return $bcrypt->verify($password, $hash);
		}

		if(resolve_login($password, $row['password']) == 1) {
			$user = array();
			$user['email'] = $row['email'];
			$user['nama'] = $row['nama'];
			$user['role'] = $row['role'];
            $user['status'] = true;
            $user['message'] = "Login Success!";
            echo json_encode($user, JSON_UNESCAPED_SLASHES);
		} else {
			echo json_encode([
				"status" => false,
				"message" => "Your password is wrong!",
			]);
		}
		$stmt->close();
	} else{
		echo json_encode([
			"status" => false,
			"message" => "Email not registered as ".$role."!",
		]);
	}
	$conn->close();
?>