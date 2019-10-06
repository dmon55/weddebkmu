<?php
if (isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';
    

    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordRe = $_POST['pwd-repeat']; 
    if (empty($username)||empty($email)||empty($password)||empty($passwordRe)) {
        header("Location: ../pages/signup.php?error=emptyfields&username=".$username."&mail=".$email);
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../pages/signup.php?error=invalidmailuid&uid");
        exit;
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../pages/signup.php?error=invalidmail&uid=".$username);
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../pages/signup.php?error=invaliduid&mail=".$email);
        exit();
    }else if($password !== $passwordRe ){
        header("Location: ../pages/signup.php?error=passwordcheck&username=".$username."&mail=".$email);
        exit();
    }else {

        $sql = "SELECT uname FROM member WHERE uname=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../pages/signup.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../pages/signup.php?error=usertaken&username=".$username."&mail=".$email);
                exit();
            }else{

                $sql = "INSERT INTO member (uname,email,password) VALUE (?,?,?) ";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    header("Location: ../pages/signup.php?error=sqlerror");
                    exit;
                }else{
                    $hashedpwd = password_hash($password,PASSWORD_DEFAULT);    /* Encrypt  */
                    mysqli_stmt_bind_param($stmt, "sss", $username,$email,$hashedpwd);
                    mysqli_stmt_execute($stmt); 
                    header("Location: ../pages/signup.php?signup=success");
                    exit();
                }

            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../pages/signup.php");
     exit();
}