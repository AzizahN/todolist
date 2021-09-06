<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$id = isset($_POST["idadmin"]) ? $_POST["idadmin"] : die();
$sql = "DELETE FROM users WHERE id = ?";

// prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->affected_rows >= 0) {
    $arr_hasil = array("status"=>true, "pesan"=>"Admin deleted.");
} else {
    $arr_hasil = array("status"=>false, "pesan"=>$conn->error);
}
echo json_encode($arr_hasil);
$conn->close();

?>