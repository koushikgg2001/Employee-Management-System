<?php
    include '../config.php';
    $pid = $_GET['pid'];
    $id = $_GET['id'];
    $date = date('Y-m-d');
    $result = mysqli_query($conn , "UPDATE `project` SET `subdate`='$date',`status`='Submitted' WHERE pid = '$pid';");
    header("Location: ../empproject.php?id=$id");
?>