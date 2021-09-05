<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$id_tags = $_POST["id_tags"];
$judul = $_POST["judul"];
$deadline = $_POST["deadline"];
date_default_timezone_set("Asia/Jakarta");
$created_at = date('d-m-Y H:i:s');

$sql = "INSERT INTO todolists (tags_id, judul, deadline, created_at) VALUES (?, ?, ?, ?)";

// prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $id_tags, $judul, $deadline, $created_at);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $arr_hasil = array("status"=>true, "pesan"=>"To do list created.");
} else {
    $arr_hasil = array("status"=>false, "pesan"=>$conn->error);
}
echo json_encode($arr_hasil);
$conn->close();

?>