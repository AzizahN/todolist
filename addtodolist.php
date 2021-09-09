<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
if (isset($_POST["id_tags"])){
    $id_tags = $_POST["id_tags"];
}else{
    header("HTTP/1.1 209 No id_tags Param"); 
    die();
}
if (isset($_POST["id_users"])){
    $id_users = $_POST["id_users"];
}else{
    header("HTTP/1.1 209 No id_users Param"); 
    die();
}
if (isset($_POST["todolist"])){
    $todolist = $_POST["todolist"];
}else{
    header("HTTP/1.1 200 No todolist Param");
    die();
}
if (isset($_POST["deadline"])){
    $deadline = $_POST["deadline"];    
}else{
    header("HTTP/1.1 200 No deadline Param");
    die();
}
date_default_timezone_set("Asia/Jakarta");
$created_at = date('Y-m-d H:i:s');

if (isset($_FILES["photo"]["tmp_name"])){
    $photo = $_FILES["photo"]["tmp_name"];
    $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $ext = explode('?', $ext)[0];
    
    $sql = "INSERT INTO todolists (tags_id, todolist, deadline, created_at, checklist, is_deleted, photo, users_id) VALUES (?,?,?,?,'0','0',?,?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssi", $id_tags, $todolist, $deadline, $created_at, $ext, $id_users); //nyesuain sql
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        $idtodolist = $conn->insert_id;
        $arr_hasil = array("status"=>true, "pesan"=>"To do list created.");
        move_uploaded_file($photo, "images/".$idtodolist.".".$ext);
    } else {
        $arr_hasil = array("status"=>false, "pesan"=>"Failed to create to do list.");
        header("HTTP/1.1 210 Failed");
    }
} else {
    $sql = "INSERT INTO todolists (tags_id, todolist, deadline, created_at, checklist, is_deleted, users_id) VALUES (?,?,?,?,'0','0',?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $id_tags, $todolist, $deadline, $created_at, $id_users);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        $arr_hasil = array("status"=>true, "pesan"=>"To do list created.");
    } else {
        $arr_hasil = array("status"=>false, "pesan"=>"Failed to create to do list.");
        header("HTTP/1.1 210 Failed");
    }
}

echo json_encode($arr_hasil);
$conn->close();

?>