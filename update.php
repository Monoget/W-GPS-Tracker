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
                document.cookie = 'alert = 4;';
                window.location.href='Vehicle-List';
                </script>";
}

if (isset($_POST["editUser"])) {
    $id = $db_handle->checkValue($_POST['id']);

    $name = $db_handle->checkValue($_POST['name']);
    $email = $db_handle->checkValue($_POST['email']);
    $password = $db_handle->checkValue($_POST['password']);

    $role = $db_handle->checkValue($_POST['role']);

    $attach_files = '';
    $query_add='';
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

            $data = $db_handle->runQuery("SELECT * FROM admin_login where id={$id}");
            unlink($data[0]["image"]);

            move_uploaded_file($file_tmp, "images/profile/" . $file_name);
            $attach_files = 'images/profile/' . $file_name;
            $query_add.=",`image`='".$attach_files."'";
            echo $query_add;
        }

    } else {
        $query_add.='';
    }

    $update = $db_handle->insertQuery("UPDATE `admin_login` SET `name`='$name'".$query_add.",`email`='$email',`password`='$password',`role`='$role' WHERE id='$id'");

    echo "<script>
                document.cookie = 'alert = 4;';
                window.location.href='User-List';
                </script>";
}