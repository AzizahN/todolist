<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
if(isset($_POST["id_admin"])){
    $id_admin = $_POST["id_admin"];
} else{
    header("HTTP/1.1 209 No id_admin Param");
    die();
}

$sql = "DELETE FROM users WHERE id = ?";

// prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_admin);
$stmt->execute();

if ($stmt->affected_rows >= 0) {
    $arr_hasil = array("status"=>true, "message"=>"Admin deleted.");
} else {
    $arr_hasil = array("status"=>false, "pesan"=>"Failed to delete admin.");
    header("HTTP/1.1 210 Failed");
}
echo json_encode($arr_hasil);
$conn->close();

?>