<?php
require 'dbh.inc.php';
session_start();
    if(isset($_POST['uid']) && $_POST['uid']!=""){
        
        $uid = $_POST['uid'];
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO orderidbig (uid,time) VALUES ('$uid','$date') ";

    }else{
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO orderidbig (time) VALUES ('$date') ";
    }
    mysqli_query($conn,$sql);

        $array = $_SESSION["shopping_cart"];
        $sql = "SELECT * FROM orderidbig WHERE time='$date'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == true){
            $fetchrr = mysqli_fetch_array($result);
            $oid      = $fetchrr['oid'];  
        }else{
            mysqli_close($conn);
            header("Location: ../pages/News.php?error=noorder");
            exit();
        }
        if(is_array($array)){

         foreach ($array as $key => $value) {
         $name = mysqli_real_escape_string($conn, $value['gname']);
         $id = mysqli_real_escape_string($conn, $value['gid']);
         $price = mysqli_real_escape_string($conn, $value['price']);
         $quan = mysqli_real_escape_string($conn, $value['quantity']);
         $sql = "INSERT INTO orderdetail (gid, gname, price, quanlity, oid) values ('$id','$name','$price','$quan','$oid') ";
         mysqli_query($conn, $sql);
         }
        unset($_SESSION['shopping_cart']);
         mysqli_close($conn);
         header("Location: ../pages/conf.php?Transaction=complete");
         exit();
        }
        
    
