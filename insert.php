<?php
session_start();
require_once("includes/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");

if (isset($_POST["addVehicle"])) {

    $name = $db_handle->checkValue($_POST['name']);
    $driver_name = $db_handle->checkValue($_POST['driver_name']);
    $driver_number = $db_handle->checkValue($_POST['driver_number']);
    $inserted_at=date("Y-m-d H:i:s");
    $insert = $db_handle->insertQuery("INSERT INTO `vehicle`(`name`, `driver_name`, `driver_number`, `inserted_at`) VALUES ('$name','$driver_name','$driver_number','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Add-Vehicle';
                </script>";
}


if (isset($_POST["addUser"])) {

    $name = $db_handle->checkValue($_POST['name']);
    $email = $db_handle->checkValue($_POST['email']);
    $password = $db_handle->checkValue($_POST['password']);

    $role = $db_handle->checkValue($_POST['role']);
    $inserted_at=date("Y-m-d H:i:s");


    $attach_files = '';
    if (!empty($_FILES['user_icon']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);

        $file_name = $RandomAccountNumber . "_" . $_FILES['user_icon']['name'];
        $file_size = $_FILES['user_icon']['size'];
        $file_tmp = $_FILES['user_icon']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "images/profile/" . $file_name);
            $attach_files = "images/profile/" . $file_name;
        }

    } else {
        $attach_files = 'images/profile/12.png';
    }

    $insert = $db_handle->insertQuery("INSERT INTO `admin_login`( `name`, `image`, `email`, `password`, `role`, `inserted_at`) VALUES ('$name','$attach_files','$email','$password','$role','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Add-User';
                </script>";
}