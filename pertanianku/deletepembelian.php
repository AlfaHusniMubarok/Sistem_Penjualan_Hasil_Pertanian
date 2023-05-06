<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
include_once("config.php");
$id_pembelian = $_GET['id_pembelian'];
$result = mysqli_query($mysqli, "DELETE FROM pembelian WHERE id_pembelian = '$id_pembelian'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pembelian.php");
?>