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
    <div class="warpper-main">
        <section class="section-default">
        <?php
            if (isset($_SESSION['UserUnID'])) {
                echo'<p class="login-status">You are logged in!</p>
                <META HTTP-EQUIV="Refresh" CONTENT="3;URL=../pages/News.php">
                ';
                
            }else{
                echo'<p class="login-status">You are logged out!</p>
                <META HTTP-EQUIV="Refresh" CONTENT="3;URL=../pages/News.php">
                ';
            }
        ?>
            
        </section>
    </div>
</main>

<?php
    require "footer.php";
?>