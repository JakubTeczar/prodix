<?php
session_start();
require "../connect.php";
$ID = $_SESSION['id'];

$query = "SELECT * FROM `pomiary` WHERE `IDUzytkownika` =  $ID ";
$result = mysqli_query($connection, $query);
$row=mysqli_fetch_assoc($result);
echo $row['pomiary'];
