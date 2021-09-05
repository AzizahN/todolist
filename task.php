<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$id_task = $_POST["id_task"];
date_default_timezone_set("Asia/Jakarta");
$updated_at = date('d-m-Y H:i:s');

$sql = "SELECT idtodolist, task, checklist, photo FROM task WHERE ";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $data = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $data[$i]['idtodolist'] = stripslashes($row['idtodolist']);
        $data[$i]['task'] = stripslashes($row['task']);
        $data[$i]['checklist'] = stripslashes($row['checklist']);
        $data[$i]['photo'] = stripslashes($row['photo']);
        $i++;
    }
    echo json_encode($data);
}else {
    echo "Unable to process your request, please try again";
    die();
}
$stmt->close();
$conn->close();

?>

