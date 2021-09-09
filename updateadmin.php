<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
include "bcrypt.php";
if (isset($_POST["idadmin"])){
    $id = $_POST["idadmin"];
} else {
    header("HTTP/1.1 209 No idadmin Param");
    die();
}
if (isset($_POST["email"])){
    $email = $_POST["email"];
} else {
    header("HTTP/1.1 209 No email Param");
    die();
}
if (isset($_POST["nama"])){
    $nama = $_POST["nama"];
}else{
    header("HTTP/1.1 209 No nama Param");
    die();
}
$password = isset($_POST["password"]) ? $_POST["password"] : "";

date_default_timezone_set("Asia/Jakarta");
$updated_at = date('Y-m-d H:i:s');
if ($password!=""){
    $bcrypt = new Bcrypt(16);
    $password = $bcrypt->hash($password);
    $sql = "UPDATE users SET email = ?, nama = ?, password = ?, updated_at = ? WHERE id = ? and role='admin'";

    // prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $email, $nama, $password, $updated_at, $id);
    $stmt->execute();
} else {
    $sql = "UPDATE users SET email = ?, nama = ?, updated_at = ? WHERE id = ? and role='admin'";

    // prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $email, $nama, $updated_at, $id);
    $stmt->execute();
}

if ($stmt->affected_rows > 0) {
    $arr_hasil = array("status"=>true, "pesan"=>"Admin updated.");
} else {
    $arr_hasil = array("status"=>false, "pesan"=>"Failed to update admin.");
    header("HTTP/1.1 210 Failed");
}
echo json_encode($arr_hasil);
$conn->close();

?>
