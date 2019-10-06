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
        .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        }
        .jumbotron-fluid{
            background-color: #343434;
        }
        .helpme{
            background-color: #343434;
        }
        </style>
        <br>
        <div class="container">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Modern Era (TH10-Th12.5)</h1>
                    <img src="../images/modern.png" alt="classic" class="center" >
                    <p>The first Modern Era is characterized by its crisp look and feel, as well as boss gauges sporting stars underneath instead of the extra gauges on the side, and that the POC is always available without focusing.</p>
                    <div class="row">
                    <?php
                        require '../includes/dbh.inc.php';
                        $sql = "SELECT * FROM gamelist WHERE type ='Modern'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                $g_id      = $row['gid'];
                                $g_name    = $row["gname"];
                                $g_price   = $row["price"];
                                $g_img     = $row['gimg'];
                                $g_type    = $row['type'];
                                $path = "../uploaded/$g_type/";

                                echo "
                                <div class='col-12 col-md-3 col-lg-3 mt-3 '>
                                    <div class='card text-center' >
                                        <header class='card-header helpme'>
                                            <a href='../pages/item.php?gid=$g_id'>
                                                <img src='$path$g_img' alt='$g_name' width='200' height='200'>
                                            </a>
                                        </header>
                                        <div class='card-body helpme'>
                                            <span class='card-text h5'>$g_name</span>
                                        </div>
                                        <div class='card-body border-top helpme'>
                                            <span class='h5'>".number_format($g_price)." Bath</span>
                                            <div class='grid-container'>
                                            <form action='../includes/additem.inc.php' method='post' enctype='multipart/form-data'>
                                                <button href type='submit' name='pick-submit'>I want this</button>
                                            </form>
                                            <form action='../pages/item.php?gid=$g_id' method='post' enctype='multipart/form-data'>
                                                <button type='submit' name='pick-submit'>Watch</button>
                                            </form>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>";
                            }

                        }else {
                            echo "Why am i show up!?";
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
</main>
        
