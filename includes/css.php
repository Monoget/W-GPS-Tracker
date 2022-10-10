<?php
if(!isset($_SESSION["name"])){
    echo "<script>
                window.location.href='Login';
                </script>";
}
?>
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
<link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">