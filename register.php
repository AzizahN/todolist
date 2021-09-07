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
	if (isset($_POST['nama'])){
	    $nama = $_POST['nama'];
	} else {
	    header("HTTP/1.1 209 No nama Param"); 
	    die();
	}
    date_default_timezone_set("Asia/Jakarta");
    $created_at = date('Y-m-d H:i:s');

    if ($role == "superadmin"){
        header("HTTP/1.1 210 Failed");
        $user = array();
        $user['status'] = false;
        $user['message'] = "You can't create super admin!";
        echo json_encode($user, JSON_UNESCAPED_SLASHES);
    } else if ($role == "user" || $role == "admin") {
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0){
            header("HTTP/1.1 210 Failed");
            $user = array();
            $user['status'] = false;
            $user['message'] = "Email already registered!";
            echo json_encode($user, JSON_UNESCAPED_SLASHES);
        } else {
            $bcrypt = new Bcrypt(16);
            $password = $bcrypt->hash($password);
            $sql = "INSERT into users (email, nama, password, created_at, role) values (?,?,?,?,?)";
    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssss', $email, $nama, $password, $created_at, $role);
            $stmt->execute();
        
            if ($stmt->affected_rows > 0) {
                $user = array();
                $user['email'] = $email;
                $user['name'] = $nama;
                $user['role'] = $role;
                $user['status'] = true;
                $user['message'] = "Register Success!";
                echo json_encode($user, JSON_UNESCAPED_SLASHES);
            } else {
                header("HTTP/1.1 210 Failed");
                $user = array();
                $user['status'] = false;
                $user['message'] = "Register Failed!";
                echo json_encode($user, JSON_UNESCAPED_SLASHES);
            }
        }
        $stmt->close();
        
    }
    $conn->close();
?>