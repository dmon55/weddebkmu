<?php

if (isset($_POST['NewsEdit-submit'])) {
    require 'dbh.inc.php';

        $news = $_POST['newsinfo'];
        $finalnews = str_replace("'","\'",$news);
        $sql = "UPDATE `newsbox` SET `info` = '$finalnews' WHERE iid = 1";
        if (mysqli_query($conn, $sql)){
            echo "Record updated successfully";
            header("Location: ../pages/News.php?set=success");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
            header("Location: ../pages/News.php?error=sqlerror");
            exit();
        }
}else{
    header("Location: ../pages/News.php");
     exit();
}