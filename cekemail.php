<?php 
    header("Access-Control-Allow-Origin: *");
    include "conn.php";

    $email = isset($_POST['email']) ? $_POST['email'] : die();
    $role = isset($_POST['role']) ? $_POST['role'] : die();
    $strfor = isset($_POST['strfor']) ? $_POST['strfor'] : die();

    if ($strfor=='regis' || $strfor=='forgot'){
        if ($role=="admin" || $role=="user"){
            $sql = "SELECT * FROM users WHERE email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($strfor=="regis"){
                if($res->num_rows > 0) {
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