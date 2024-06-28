<?php

session_start();
include "../database/pdo_connection.php";

$getId=$_GET['id'];
$deleTe=$conn->prepare("DELETE FROM posts WHERE id=?");
$deleTe->bindValue(1,$getId);
$deleTe->execute();
header("location:posts.php");


if(!isset($_SESSION['user'])){
  header("location:../login.php");
  
}

?>