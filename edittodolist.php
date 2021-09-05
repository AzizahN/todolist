<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$id_todolist = $_POST["idtodolist"];
//$id_tags = $_POST["id_tags"];
//$judul = $_POST["judul"];
//$deadline = $_POST["deadline"];
date_default_timezone_set("Asia/Jakarta");
$updated_at = date('d-m-Y H:i:s');

$sql = "UPDATE todolists SET tags_id = $id_tags, judul = $judul, deadline = $deadline, updated_at = $updated_at WHERE id = $id_todolist";

// prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $id_tags, $judul, $deadline, $updated_at);
$stmt->execute();

if ($stmt->affected_rows >= 0) {
    $arr_hasil = array("status"=>true, "pesan"=>"To do list updated.");
} else {
    $arr_hasil = array("status"=>false, "pesan"=>$conn->error);
}
echo json_encode($arr_hasil);
$conn->close();

?>