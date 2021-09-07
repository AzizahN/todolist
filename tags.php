<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$sql = "SELECT * FROM tags";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $data = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $data[$i]['id'] = stripslashes($row['id']);
        $data[$i]['tags'] = stripslashes($row['tags']);
        $i++;
    }
    echo json_encode($data);
}else {
    header("HTTP/1.1 210 Failed");
    echo "Unable to process your request, please try again";
    die();
}
$stmt->close();
$conn->close();

?>

