<?php
header("Access-Control-Allow-Origin: *");

include "conn.php";
if(isset($_POST["id_todolist"])){
    $id_todolist = $_POST["id_todolist"];
}else{
    header("HTTP/1.1 209 No id_todolist Param");
    die();
}

$sql = "UPDATE todolists SET is_deleted = '1' WHERE id = ?";

//prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_todolist);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $arr_hasil = array("status"=>true, "pesan"=>"To do list deleted");
} else {
    $arr_hasil = array("status"=>false, "pesan"=>"Failed to delete to do list.");
    header("HTTP/1.1 210 Failed");
}
echo json_encode($arr_hasil);
$conn->close();

?>

