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
        .input-group {
            height: 30px;
            width: 50%;
            margin: 10px 0px 10px 0px;	
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
    <br>
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Are you sure?</h1>
            <?php
                require '../includes/dbh.inc.php';
                $g_id = $_GET['gid'];
                $sql = "SELECT * FROM gamelist WHERE gid='$g_id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == true){
                    $fetchrr = mysqli_fetch_array($result);
                    $g_id      = $fetchrr['gid'];
                    $g_name    = $fetchrr["gname"];
                echo "To delete $g_name";
                if (isset($_SESSION['power'])) {
                    if($_SESSION['power'] == "2"){
                        echo"
                                <form action='../includes/delitem.inc.php' method='post' enctype='multipart/form-data'>
                                    <button href type='submit' name='pick-submit'>Yes</button>
                                </form><br>
                            ";
                    }
                }
                echo "
                <form action='../pages/item.php?gid=$g_id' method='post' enctype='multipart/form-data'>
                    <button type='submit' name='pick-submit'>No</button>
                </form>";
                    ;}
                ?>   
            </div>
        </div>
    </div>
</main>