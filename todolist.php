<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
if (isset($_GET['email'])){
    $email = $_GET['email'];
} else {
   header("HTTP/1.1 209 No email Param");
   die();
}

$sql = "SELECT td.id as id, todolist, deadline, td.created_at as created_at, checklist, photo, t.tags as tags FROM todolists td INNER JOIN tags t on t.id=td.tags_id INNER JOIN users u on td.users_id=u.id where u.email=? and is_deleted='0' order by td.id";

$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
date_default_timezone_set("Asia/Jakarta");
$now = date('Y-m-d H:i:s');

if ($result->num_rows > 0) {
    $data = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $data[$i]['id'] = stripslashes($row['id']);
        $data[$i]['todolist'] = stripslashes($row['todolist']);
        $data[$i]['deadline'] = stripslashes($row['deadline']);
        $data[$i]['checklist'] = stripslashes($row['checklist']);
        $data[$i]['created_at'] = stripslashes($row['created_at']);
        $data[$i]['photo'] = stripslashes($row['photo']);
        $data[$i]['tags'] = stripslashes($row['tags']);
        if ($row['checklist'] == '1') {
            $checklist = "Completed";
        } else if ($row['checklist'] == '0') {
            if (new DateTime($row['deadline']) > new DateTime($now)){
                $checklist = "Doing";
            } else {
                $checklist = "Overdue";
            }
        }
        $data[$i]['status'] = stripslashes($checklist);
        $i++;
    }
    echo json_encode($data);
} else {
    header("HTTP/1.1 210 Failed");
    $data = array();
    $data[0]['todolist'] = stripslashes("You don't have any to do list yet!");
    echo json_encode($data);
    die();
}
$stmt->close();
$conn->close();
?>