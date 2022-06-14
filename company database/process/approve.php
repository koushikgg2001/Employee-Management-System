<?php
    include '../config.php';
    $id = $_GET['id'];
    $token = $_GET['token'];
    $result = mysqli_query($conn, "UPDATE `employee_leave` SET `status`='Approved' WHERE id = $id AND token = $token;");
    header("Location:../empleave.php");
?>