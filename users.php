<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";

if (isset($_POST["role"])){
    $role = $_POST["role"];
    if ($role=='admin' || $role=='user'){
        $sql = "SELECT id, email, nama, role, created_at FROM users where role=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $role);
        $stmt->execute();
    } else {
        $sql = "SELECT id, email, nama, role, created_at FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}else{
    header("HTTP/1.1 209 No role Param");
    die();
}

$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $data = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $data[$i]['id'] = stripslashes($row['id']);
        $data[$i]['email'] = stripslashes($row['email']);
        $data[$i]['nama'] = stripslashes($row['nama']);
        $data[$i]['created_at'] = stripslashes($row['created_at']);
        $i++;
    }
    echo json_encode($data);
} else {
    header("HTTP/1.1 210 Failed");
    echo "Cannot find the user";
    die();
}
$stmt->close();
$conn->close();
?>