<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$sql = "SELECT id, email, nama, created_at FROM users where role='user'";

$stmt = $conn->prepare($sql);
$stmt->execute();
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
    echo "Unable to process your request, please try again";
    die();
}
$stmt->close();
$conn->close();
?>