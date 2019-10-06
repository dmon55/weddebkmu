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
                    echo"<li class='nav-item '>
                            <a class='nav-link btn-outline-primary' href='../pages/item.php?gid=$g_id' style='color:#FFFFFF ' >Back</a>
                        </li>";
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
                            <div class='grid-container'>
                                <form action='../includes/edititem.inc.php?gid=$g_id' method='post' enctype='multipart/form-data'><br> 
                                    Game Name:<input class='input-group' type='text' name='gname' value='$g_name'><br>
                                    Price:<input class='input-group' type='number' name='price' value='$g_price'><br>
                                    <p>Description:</p>
                                    <textarea name='info' rows='10' cols='50' >$g_info</textarea><br>
                                    <p>Picture:</p>
                                    <input type='file' name='gpic' id='gpic' value='$g_img'><br>
                                    Type:
                                    <select name='type'>
                                        <option value='Classic'>Classic</option>
                                        <option value='Modern'>Modern</option>
                                        <option value='NewModern'>NewModern</option>
                                        <option value='Other'>Other</option>
                                    </select>
                                    <br>
                                <button type='submit' name='edit-submit'>Confirm</button>
            
                                </form>
                            </div>

                        </div>
                    </div>
                    
                    ";
                }

            ?>
            </div>
        </div>
    </div>

</main>