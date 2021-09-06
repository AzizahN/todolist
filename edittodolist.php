<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$idtodolist = $_POST["idtodolist"];
$todolist = $_POST["todolist"];
$id_tags = $_POST["id_tags"];
$deadline = $_POST["deadline"];
$checklist = $_POST["checklist"];
date_default_timezone_set("Asia/Jakarta");
$updated_at = date('Y-m-d H:i:s');

if (isset($_FILES["photo"]["tmp_name"])){
    $photo = $_FILES["photo"]["tmp_name"];
    $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $ext = explode('?', $ext)[0];

    $sql = "UPDATE todolists SET tags_id = ?, todolist = ?, deadline = ?, checklist=?, photo=?, updated_at = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $id_tags, $todolist, $deadline, $checklist, $ext, $updated_at, $idtodolist); //mengikuti tanda tanya
    $stmt->execute();

    if ($stmt->affected_rows >= 0) {
        $arr_hasil = array("status"=>true, "pesan"=>"To do list updated.");
        move_uploaded_file($photo, "images/".$idtodolist.".".$ext);
    } else {
        $arr_hasil = array("status"=>false, "pesan"=>$conn->error);
    }
    echo json_encode($arr_hasil);
} else {
    $sql = "UPDATE todolists SET tags_id = ?, todolist = ?, deadline = ?, checklist=?, updated_at = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $id_tags, $todolist, $deadline, $checklist, $updated_at, $idtodolist); //mengikuti tanda tanya
    $stmt->execute();

    if ($stmt->affected_rows >= 0) {
        $arr_hasil = array("status"=>true, "pesan"=>"To do list updated.");
    } else {
        $arr_hasil = array("status"=>false, "pesan"=>$conn->error);
    }
    echo json_encode($arr_hasil);
}
$conn->close();

?>