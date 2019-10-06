<?php
session_start();
if(isset($_POST['Edit-submit'])){
    require 'dbh.inc.php';
    $uid    =   $_SESSION['UserUID'];
    $uname   =   $_POST['uname'];
    $email  =   $_POST['email'];
    $pwd    =   $_POST['pwd'];
    $repwd    =   $_POST['repwd'];

    
    if (empty($uname)||empty($email)||empty($pwd)||empty($repwd)) {
        header("Location: ../pages/profile.php?error=emptyfields&username=".$uname."&mail=".$email);
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$uname)){
        header("Location: ../pages/profile.php?error=invalidmailuid&uid");
        exit;
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../pages/profile.php?error=invalidmail&uid=".$uname);
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$uname)){
        header("Location: ../pages/profile.php?error=invaliduid&mail=".$email);
        exit();
    }else if($pwd !== $repwd ){
        header("Location: ../pages/profile.php?error=passwordcheck&username=".$uname."&mail=".$email);
        exit();
    }else {
                $hashedpwd = password_hash($pwd,PASSWORD_DEFAULT);
                $sql = "UPDATE member SET `email`='$email',`password`='$hashedpwd' WHERE uid=$uid";
                $result = mysqli_query($conn,$sql);
                if (!$result) {
                    header("Location: ../pages/profile.php?error=sqlerror");
                }else{
                    // $hashedpwd = password_hash($password,PASSWORD_DEFAULT);    /* Encrypt  */
                    // mysqli_stmt_bind_param($stmt, "ss",$email,$hashedpwd);
                    // mysqli_stmt_execute($stmt); 
                    header("Location: ../pages/profile.php?profile=success");
                    exit();
                }

            
        }

}else {
    header("Location: ../pages/News.php");
     exit();
}