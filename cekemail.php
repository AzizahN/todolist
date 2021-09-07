<?php 
    header("Access-Control-Allow-Origin: *");
    include "conn.php";

    if (isset($_POST['email'])){
        $email = $_POST['email'];    
    } else {
        header("HTTP/1.1 209 No email Param"); 
        die();
    }
    if (isset($_POST['role'])){
        $role = $_POST['role'];
    } else {
       header("HTTP/1.1 209 No role Param");
       die();
    }
    if (isset($_POST['strfor'])){
        $strfor = $_POST['strfor'];    
    } else {
        header("HTTP/1.1 209 No strfor Param");
        die();
    }

    if ($strfor=='regis' || $strfor=='forgot'){
        if ($role=="admin" || $role=="user"){
            $sql = "SELECT * FROM users WHERE email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($strfor=="regis"){
                if($res->num_rows > 0) {
                    header("HTTP/1.1 210 Failed");
                    echo json_encode([
                        "status" => false,
                        "message" => "Email already registered!",
                    ]);
                } else {
                    echo json_encode([
                        "status" => true,
                        "message" => "New Email!",
                    ]);
                }
            } else if ($strfor=="forgot"){
                if($res->num_rows > 0) {
                    echo json_encode([
                        "status" => true,
                        "message" => "Email found!",
                    ]);
                } else {
                    header("HTTP/1.1 210 Failed");
                    echo json_encode([
                        "status" => false,
                        "message" => "Email is not registered!",
                    ]);
                }
            }
            $stmt->close();
        }
    }
    $conn->close();
?>