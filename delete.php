<?php 
/**
 * Database Connaction here
 */
    include_once"function.php";
    require_once"apps/connection.php";



/**
 * Get URL dara Resepce now
 */

 if(isset($_GET["student_id_d"])){
    echo $id = $_GET["student_id_d"];
 }


    $sql = "DELETE FROM students WHERE student_id = '$id' ";

    $connection -> query($sql);

    header("location:index.php");



