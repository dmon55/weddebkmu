<?php
require 'header.php';
require 'dbh.inc.php';
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
                        <h1 class="display-4">Infomation</h1>
                        
                    </div>
                </div>
        </div>
    </div>
    
</main>