<?php
if(isset($_POST['edit-submit'])){
    require 'dbh.inc.php';
    $gid    =   $_GET['gid'];
    $name   =   $_POST['gname'];
    $price  =   $_POST['price'];
    $ginfo  =   $_POST['info'];

    $gimg = $_FILES['gpic']['name'];
    $type = $_POST["type"];
    $target_path = '../uploaded/'.$type.'/';
    $finalnews = str_replace("'","\'",$ginfo);
    $target_path = $target_path.basename( $_FILES['gpic']['name']);
    $sql = "UPDATE `gamelist`SET `type`='$type', `gname`='$name', `price`='$price', `ginfo`='$finalnews',`gimg`='$gimg' WHERE gid=$gid";

    
    if (mysqli_query($conn, $sql)){
        if (move_uploaded_file($_FILES['gpic']['tmp_name'], $target_path)) {
            echo "Record updated successfully";
            //header("Location: ../pages/item.php?gid=$gid");
        }
        
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        //header("Location: ../pages/item.php?gid=$gid");
    }
}else {
    header("Location: ../pages/News.php");
     exit();
}