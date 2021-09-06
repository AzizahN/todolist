<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$id_tags = $_POST["id_tags"];
$id_users = $_POST["id_users"];
$todolist = $_POST["todolist"];
$deadline = $_POST["deadline"];
date_default_timezone_set("Asia/Jakarta");
$created_at = date('Y-m-d H:i:s');

if (isset($_FILES["photo"]["tmp_name"])){
    $photo = $_FILES["photo"]["tmp_name"];
    $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $ext = explode('?', $ext)[0];
    
    $sql = "INSERT INTO todolists (tags_id, todolist, deadline, created_at, checklist, photo, users_id) VALUES (?,?,?,?,'0',?,?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssi", $id_tags, $todolist, $deadline, $created_at, $ext, $id_users); //nyesuain sql
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        $idtodolist = $conn->insert_id;
        $arr_hasil = array("status"=>true, "pesan"=>"To do list created.");
        move_uploaded_file($photo, "images/".$idtodolist.".".$ext);
    } else {
        $arr_hasil = array("status"=>false, "pesan"=>$conn->error);
    }
} else {
    $sql = "INSERT INTO todolists (tags_id, todolist, deadline, created_at, checklist, users_id) VALUES (?,?,?,?,'0',?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $id_tags, $todolist, $deadline, $created_at, $id_users);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        $arr_hasil = array("status"=>true, "pesan"=>"To do list created.");
    } else {
        $arr_hasil = array("status"=>false, "pesan"=>$conn->error);
    }
}

echo json_encode($arr_hasil);
$conn->close();

?>