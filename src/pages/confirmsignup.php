<?php
    require "header.php";
    
?>
<main>
<style>
body {
        background-image: url('../images/village.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;    
        }
        .input-group {
            height: 30px;
            width: 50%;
            margin: 10px 0px 10px 0px;	
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
        }
</style>
<br>
<div class="container">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Are you sure?</h1>
                <?php
                    $name=$_POST['uname'];   //get data form the FORM รับข้อมูลจากหน้าแบบฟอร์ม
                    $email = $_POST['mail'];
                    $pwd = $_POST['pwd'];
                    $repwd = $_POST['pwd-repeat'];
                    echo "<form action='../includes/signup.inc.php' method=post>
                        Name: <input class='input-group' value='$name' type='text' name='name' readonly><br>
                        Email: <input class='input-group' value='$email' type='text' name='email' readonly><br>
                        Password:<input class='input-group' value='$pwd' type='password' name='pwd' readonly><br>
                        Re-password:<input class='input-group' value='$repwd' type='password' name='pwd-repeat' readonly><br>
                        <button type='submit' name='signup-submit'>OK</button>
                        </form>
                        <br>
                        <form action='../pages/signup.php' method='post'>
                        <button type='submit' name='back-submit'>Back</button>
                        </form>
                        ";
                ?>
                    
                </div>
            </div>
        </div>

</main>