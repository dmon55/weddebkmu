<?php
require 'header.php';
?>

<main>
    <style>
            body {
            background-image: url('../images/market.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;    
            }
    </style>
    <br>
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
            <?php
            require '../includes/dbh.inc.php';
            $g_id = $_GET['gid'];
            if (isset($_SESSION['power'])) {
                if($_SESSION['power'] == "2"){
                    echo"<li class='nav-item '>
                            <a class='nav-link btn-outline-danger' href='../pages/deleteitem.php?gid=$g_id' style='color:#FFFFFF ' >Delete Product</a>
                            <a class='nav-link btn-outline-warning' href='../pages/edititem.php?gid=$g_id' style='color:#FFFFFF ' >Edit</a>
                        </li>";
                }
                $sql = "SELECT * FROM gamelist WHERE gid='$g_id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == true){
                    $fetchrr = mysqli_fetch_array($result);
                    $g_id      = $fetchrr['gid'];
                    $g_name    = $fetchrr["gname"];
                    $g_price   = $fetchrr["price"];
                    $g_img     = $fetchrr['gimg'];
                    $g_type    = $fetchrr['type'];
                    $g_info    = $fetchrr['ginfo'];
                    $path = "../uploaded/$g_type/";

                    echo"
                    <div class='row'>
                        <div class='col'>
                            <img src='$path$g_img' alt='$g_name' width='400' height='400'>
                        </div>
                        <div class='col-lg'>
                         Name:<span class='card-text h5'>$g_name </span><br>
                         Price: <span class='card-text h5'>$g_price Bath</span><br>
                        Description:<br><span>$g_info</span><br>
                            <div class='grid-container'>
                                <button type='submit' name='pick-submit'>Buy now</button>
                                <button type='submit' name='pick-submit'>Add to cart</button>
                            </div>

                        </div>
                    </div>
                    ";
                }
            }

            ?>
            </div>
        </div>
    </div>

</main>