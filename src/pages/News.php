<?php
    require "header.php";
?>
<main>
        <style>
        body {
        background-image: url('../images/bg2.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;    
        }
        </style>
        <br>
        <div class="container">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Update</h1>
                    <p class="lead">
                        <?php
                                require '../includes/dbh.inc.php';
                                $sql = "SELECT info FROM newsbox WHERE iid = 1";
                                $result = mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result) > 0){
                                        $fetcharr = mysqli_fetch_array($result);
                                        $name = $fetcharr['info'];
                                        echo"<textarea class='input-group' name='newsinfo' rows='20' cols='50' readonly>$name
                                        </textarea>";
                                }
                                if (isset($_SESSION['power'])) {
                                    if($_SESSION['power'] == "2"){
                                        echo"<form action='../pages/Newsedit.php' method='post'>
                                        <button type='submit' name='news-submit'>Edit</button>
                                        </form>";
                                    }
                                }
                        ?>
                    </p>
                </div>
            </div>
        </div>
</main>

