<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
include_once("config.php");
$id_konsumen = $_GET['id_konsumen'];
$result = mysqli_query($mysqli, "DELETE FROM konsumen WHERE id_konsumen = '$id_konsumen'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:admin.php");
?>