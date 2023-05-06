<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
include_once("config.php");
$id_penjualan = $_GET['id_penjualan'];
$result = mysqli_query($mysqli, "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:penjualan.php");
?>