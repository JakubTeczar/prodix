<?php
session_start();
require "../connect.php";
$ID = $_SESSION['id'];

$query = "SELECT * FROM `cwiczenia` WHERE `IDUzytkownika` =  $ID";
$result = mysqli_query($connection, $query);
$row=mysqli_fetch_assoc($result);
echo $row['cwiczenie'];
