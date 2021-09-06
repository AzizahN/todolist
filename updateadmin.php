<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
$id = isset($_POST["idadmin"]) ? $_POST["idadmin"] : die();
$email = isset($_POST["email"]) ? $_POST["email"] : die();
$nama = isset($_POST["nama"]) ? $_POST["nama"] : die();
$password = isset($_POST["password"]) ? $_POST["password"] : die();
date_default_timezone_set("Asia/Jakarta");
$updated_at = date('Y-m-d H:i:s');

$sql = "UPDATE users email = ?, nama = ?, password = ?, updated_at = ? WHERE id = ? and role='admin'";

// prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $email, $nama, $password, $updated_at, $id);
$stmt->execute();

if ($stmt->affected_rows >= 0) {
    $arr_hasil = array("status"=>true, "pesan"=>"Admin updated.");
} else {
    $arr_hasil = array("status"=>false, "pesan"=>$conn->error);
}
echo json_encode($arr_hasil);
$conn->close();

?>