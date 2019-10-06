<?php
if(isset($_POST['addup-submit'])){
    require 'dbh.inc.php';
    $name   =   $_POST['gname'];
    $price  =   $_POST['price'];
    $ginfo  =   $_POST['info'];
    $glink  =   $_POST['key'];

    $gimg = $_FILES['gpic']['name'];
    $type = $_POST["type"];
    $target_path = '../uploaded/'.$type.'/';
    $finalnews = str_replace("'","\'",$ginfo);
    $target_path = $target_path.basename( $_FILES['gpic']['name']);
    $sql = "INSERT INTO `gamelist`(`type`, `gname`, `price`, `ginfo`,`gimg`,`glink`) VALUES ('$type','$name','$price','$finalnews','$gimg','$glink')";

    
    if (mysqli_query($conn, $sql)){
        if (move_uploaded_file($_FILES['gpic']['tmp_name'], $target_path)) {
            echo "Record updated successfully";
            header("Location: ../pages/additem.php?set=success");
        }
        
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        header("Location: ../pages/additem.php?error=sqlerror");
        exit();
    }
}else {
    header("Location: ../pages/News.php");
     exit();
}