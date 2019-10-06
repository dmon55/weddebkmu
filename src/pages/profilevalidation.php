<?php 
require "header.php";
?>
<main>
    <style>
        body {
        background-image: url('../images/594332.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;    
        }
        .input-group {
            height: 30px;
            width: 50%;
            margin: 5px 0px 5px 0px;	
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
        }
        .input-info{
            height: 30px;
            width: 50%;
            margin: 10px 0px 10px 0px;	
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
        }
        .row{
            padding: 20px 50px;  
        }
    </style>
    <div class="row">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Profile</h1>
                <ul class="list-group">
                    <li>
                    <a class='list-group-item active btn-outline-success' href='../pages/profile.php' style='color:#FFFFFF ' >Profile</a>
                    </li>
                    <li>
                    <a class='list-group-item btn-outline-success' href='../pages/profile_lib.php'name='User-lib' style='color:#FFFFFF ' >Librare</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">User Infomation</h1>
                        <?php
                        require '../includes/dbh.inc.php';
                        $user = $_SESSION['UserUID'];
                        $sql = "SELECT * FROM member WHERE uid=$user";
                        $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0){
                            echo "<b>User Detail</br><hr>";
                                $fetcharr = mysqli_fetch_array($result);
                                $name = $fetcharr['uname'];
                                $email = $fetcharr['email'];
                                echo"<form action='../includes/proedit.inc.php' method='post'>
                                        <input class='input-group' value='$name' type='text'  name='uname' readonly> <br>
                                        <input class='input-group' value='$email' type='text' name='email' ><br>
                                        <input class='input-group' type='password' name='pwd' placeholder='Password'><br>
                                        <input class='input-group' type='password' name='repwd' placeholder='Re-Password'><br>
                                        <button type='submit' name='Edit-submit'>Edit</button>
                                    </form>";
                        }
                        ?> 
                    </div>
                </div>
        </div>
    </div>
    
</main>