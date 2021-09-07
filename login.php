<?php 
  	header("Access-Control-Allow-Origin: *");
	include "bcrypt.php";
	include "conn.php";

	if (isset($_POST['email'])) {
	    $email = $_POST['email'];
	} else {
	    header("HTTP/1.1 209 No email Param");
	    die();
	}
	if (isset($_POST['password'])) {
	    $password = $_POST['password'];
	} else {
	    header("HTTP/1.1 209 No password Param");
	    die();
	}
	if (isset($_POST['role'])){
	    $role = $_POST['role'];
	} else {
	    header("HTTP/1.1 209 No role Param"); 
	    die();
	}
	
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
			header("HTTP/1.1 210 Failed");
			echo json_encode([
				"status" => false,
				"message" => "Your password is wrong!",
			]);
		}
		$stmt->close();
	} else{
		header("HTTP/1.1 210 Failed");
		echo json_encode([
			"status" => false,
			"message" => "Email not registered as ".$role."!",
		]);
	}
	$conn->close();
?>