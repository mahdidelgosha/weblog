<?php
session_start();
include "database/pdo_connection.php";
session_destroy();
header("location:login.php");
?>