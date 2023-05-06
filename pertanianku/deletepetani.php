<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
include_once("config.php");
$id_petani = $_GET['id_petani'];
$result = mysqli_query($mysqli, "DELETE FROM petani WHERE id_petani = '$id_petani'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:admin.php");
?>