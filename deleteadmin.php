<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
if(isset($_POST["idadmin"])){
    $id = $_POST["idadmin"];
} else{
    header("HTTP/1.1 209 No idadmin Param"); 
    die();
}

$sql = "DELETE FROM users WHERE id = ?";

// prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $arr_hasil = array("status"=>true, "pesan"=>"Admin deleted.");
} else {
    $arr_hasil = array("status"=>false, "pesan"=>"Failed to delete admin.");
    header("HTTP/1.1 210 Failed");
}
echo json_encode($arr_hasil);
$conn->close();

?>