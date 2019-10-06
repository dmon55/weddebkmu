<?php 
require "header.php";
?>

<main>
    <style>
        body {
        background-image: url('../images/market.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;    
        }
        .jumbotron-fluid{
            background-color: #343434;
        }
        .warpper-main{
            width: 40%;
            margin: 0px auto;
            padding: 20px;
            border: 1px solid #B0C4DE;
            background: #343434;
            border-radius: 0px 0px 10px 10px;
        }
    </style>
    <br>
    <div class="container">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4 "  >Games Store</h1>
                    <?php
                        if (isset($_SESSION['power'])) {
                            if($_SESSION['power'] == "2"){
                                echo'<div class="nav-item ">
                                    <a class="nav-link btn-outline-success" href="../pages/storemanage.php" style="color:#FFFFFF " >Store Management</a>
                                </div>';
                            }
                        }
                    ?>   
                    <ul>
                        
                    </ul>
                </div>
            </div>
        </div>
</main>