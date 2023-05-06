<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
include_once("config.php");
$id_barang = $_GET['id_barang'];
$result = mysqli_query($mysqli, "DELETE FROM barang WHERE id_barang = '$id_barang'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:admin.php");
?>