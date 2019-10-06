<?php
if(isset($_POST['del-submit'])){
    require 'dbh.inc.php';
    $gid   =   $_GET['gid'];
    $sql = "DELETE FROM `gamelist` WHERE gid='$gid'";
    if (mysqli_query($conn, $sql)){
        echo "Record updated successfully";
        header("Location: ../pages/item.php?set=success");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        header("Location: ../pages/item.php?id=$gid");
        exit();
    }
}else {
    header("Location: ../pages/News.php");
     exit();
}