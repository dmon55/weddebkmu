<?php

if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $mailuid = $_POST['username'];
    $password = $_POST['pwd'];
    if (empty($mailuid) || empty($password)) {
        header("Location: ../pages/News.php?error=emptyfields");
        exit();
    }else{
        $sql = "SELECT * FROM member WHERE uname=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../pages/News.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password,$row['password']);
                if ($pwdCheck == false) {
                    header("Location: ../pages/News.php?error=wrongpassword");
                    exit();
                }else if($pwdCheck==true){
                    session_start();
                    $_SESSION['UserUID'] = $row['uid'];
                    $_SESSION['UserUnID'] = $row['uname'];
                    $_SESSION['power'] = $row['stats'];
                    header("Location: ../pages/News.php?login=success");
                    exit();
                }else{
                    header("Location: ../pages/News.php?error=wrongpassword");
                    exit();
                }
            }else{
                header("Location: ../pages/News.php?error=nouser");
                exit();
            }
        }
    }

}else{
    header("Location: ../pages/News.php");
     exit();
}