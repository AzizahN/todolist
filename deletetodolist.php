<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$id_todolist = $_GET["id_todolist"];

$sql = "DELETE from todolists WHERE id = $id_todolist";

//prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $id_todolist);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $arr_hasil = array("status"=>true, "pesan"=>"To do list deleted");
} else {
    $arr_hasil = array("status"=>false, "pesan"=>$conn->error);
}
echo json_encode($arr_hasil);
$conn->close();

?>

