<?php
session_start();
require "../connect.php";
$ID = $_SESSION['id'];

$query = "SELECT * FROM `plany` WHERE `IDUzytkownika` =  $ID";
$result = mysqli_query($connection, $query);
$row=mysqli_fetch_assoc($result);
echo $row['plan'];

// echo json_decode($result['cwiczenia']);

// if($result){
  
//     while()
//     {
//         $from = date('Y-n-j', strtotime($row['data']));
//         //$from = date('Y-m-d', strtotime('-1 month', strtotime($row['data'])));
//         //date_modify( $from ,'-1 month' );
//         $time = date('H:i', strtotime($row['data']));
//         echo "<div class='loading-from-the-database-task'>
//             <div class='IDZadania'>{$row['IDZadania']}</div>
//             <div class='nazwa'>{$row['nazwa']} </div>
//             <div class='szczegoly'>{$row['szczegoly']} </div> 
//             <div class='data'>{$row['data']} </div>
//             <div class='wykonane'>{$row['wykonane']} </div>
//             <div class='from'>{$from}</div>
//             <div class='time'>{$time}</div>
//         </div></br>";
//     }
//     echo "</div>";
// }