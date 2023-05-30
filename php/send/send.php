<?php
session_start();
require "../connect.php";
$request = file_get_contents("php://input");
$obj = json_encode($request,JSON_UNESCAPED_UNICODE);
$ID = $_SESSION['id'];

$query = "UPDATE `cwiczenia` SET `cwiczenie` = $obj WHERE `cwiczenia`.`IDUzytkownika` = $ID;";
$result = mysqli_query($connection, $query);
// $reques = file_get_contents("php://input");
// $obj = json_decode()