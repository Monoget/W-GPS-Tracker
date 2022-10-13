<?php
session_start();
require_once("includes/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");

if (isset($_POST["editVehicle"])) {
    $id = $db_handle->checkValue($_POST['id']);

    $name = $db_handle->checkValue($_POST['name']);
    $driver_name = $db_handle->checkValue($_POST['driver_name']);
    $driver_number = $db_handle->checkValue($_POST['driver_number']);

    $update = $db_handle->insertQuery("UPDATE `vehicle` SET `name`='$name',`driver_name`='$driver_name',`driver_number`='$driver_number' WHERE id='$id'");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Vehicle-List';
                </script>";
}