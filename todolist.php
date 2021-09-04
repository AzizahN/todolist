<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$sql = "SELECT * FROM todolists";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
date_default_timezone_set("Asia/Jakarta");
$now = date('Y-m-d H:i:s');

if ($result->num_rows > 0) {
    $data = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $data[$i]['id'] = stripslashes($row['id']);
        $data[$i]['judul'] = stripslashes($row['judul']);
        $data[$i]['deadline'] = stripslashes($row['deadline']);

        $sql2 = "SELECT checklist FROM task where idtodolist=?";
        $stmt = $conn->prepare($sql2);
        $stmt->bind_param('s', $row['id']);
        $stmt->execute();
        $res = $stmt->get_result();
        $checklist;
        if ($res->num_rows > 0) {
            $checklist = "Completed";
            while ($row2 = $res->fetch_assoc()){
                if ($row2['checklist']=='0') $checklist="notcompleted";
                break;
            }
            if ($checklist == "notcompleted"){
                if (new DateTime($row['deadline']) > new DateTime($now)){
                    $checklist = "Doing";
                } else {
                    $checklist = "Overdue";
                }
            }
        } else {
            if (new DateTime($row['deadline']) > new DateTime($now)){
                $checklist = "Doing";
            } else {
                $checklist = "Overdue";
            }
        }
        $data[$i]['status'] = stripslashes($checklist);
        $data[$i]['created_at'] = stripslashes($row['created_at']);
        $data[$i]['tags_id'] = stripslashes($row['tags_id']);
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