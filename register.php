<?php 
    header("Access-Control-Allow-Origin: *");
	include "bcrypt.php";
    include "conn.php";

    $email = isset($_POST['email']) ? $_POST['email'] : die();
    $password = isset($_POST['password']) ? $_POST['password'] : die();
    $role = isset($_POST['role']) ? $_POST['role'] : die();
    $nama = isset($_POST['nama']) ? $_POST['nama'] : die();
    date_default_timezone_set("Asia/Jakarta");
    $created_at = date('Y-m-d H:i:s');

    if ($role == "superadmin"){
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