<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$id_todolist = isset($_POST["id_todolist"]) ? $_POST["id_todolist"] : die();

$sql = "UPDATE todolists SET isdeleted = '1' WHERE id = ?";

//prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_todolist);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $arr_hasil = array("status"=>true, "message"=>"To do list deleted");
} else {
    $arr_hasil = array("status"=>false, "message"=>"Failed to delete to do list");
}
echo json_encode($arr_hasil);
$conn->close();

?>

