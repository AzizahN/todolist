<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
if (isset($_POST["id_todolist"])){
    $id_todolist = $_POST["id_todolist"];
} else {
    header("HTTP/1.1 209 No id_todolist Param");
    die();
}
if (isset($_POST["todolist"])){
    $todolist = $_POST["todolist"];
}else{
    header("HTTP/1.1 209 No todolist Param");
    die();
}
if (isset($_POST["id_tags"])){
    $id_tags = $_POST["id_tags"];
} else {
    header("HTTP/1.1 209 No id_tags Param");
    die();
}
if (isset($_POST["deadline"])){
    $deadline = $_POST["deadline"];
} else{
    header("HTTP/1.1 209 No deadline Param");
    die();
}
if (isset($_POST["checklist"])){
    $checklist = $_POST["checklist"];    
} else{
   header("HTTP/1.1 209 No checklist Param");
   die();
}
date_default_timezone_set("Asia/Jakarta"); 
$updated_at = date('Y-m-d H:i:s');

if (isset($_FILES["photo"]["tmp_name"])){
    $photo = $_FILES["photo"]["tmp_name"];
    $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $ext = explode('?', $ext)[0];

    $sql = "UPDATE todolists SET tags_id = ?, todolist = ?, deadline = ?, checklist=?, photo=?, updated_at = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssi", $id_tags, $todolist, $deadline, $checklist, $ext, $updated_at, $id_todolist); //mengikuti tanda tanya
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $arr_hasil = array("status"=>true, "pesan"=>"To do list updated.");
        move_uploaded_file($photo, "images/".$id_todolist.".".$ext);
    } else {
        $arr_hasil = array("status"=>false, "pesan"=>"Failed to update to do list.");
        header("HTTP/1.1 210 Failed");
    }
    echo json_encode($arr_hasil);
} else {
    $sql = "UPDATE todolists SET tags_id = ?, todolist = ?, deadline = ?, checklist=?, updated_at = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssi", $id_tags, $todolist, $deadline, $checklist, $updated_at, $id_todolist); //mengikuti tanda tanya
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $arr_hasil = array("status"=>true, "pesan"=>"To do list updated.");
    } else {
        $arr_hasil = array("status"=>false, "pesan"=>"Failed to update to do list.");
        header("HTTP/1.1 210 Failed");
    }
    echo json_encode($arr_hasil);
}
$conn->close();

?>