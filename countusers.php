<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$sql = "SELECT COUNT(*) as Total FROM users "; //select pake fetch_assoc kalo banyak pake while
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        "status" => true,
        "total" => $row["Total"],
    ]);
} else {
    header("HTTP/1.1 210 Failed");
    echo json_encode([
        "status" => false,
        "total" => "Failed",
    ]);
}
$stmt->close();
$conn->close();
?>