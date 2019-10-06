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
                    <h1 class="display-4">Input</h1>
                    <form action="../includes/addup.inc.php" method="post">
                        <input class="input-group" type="text" name="gname" placeholder="Game name">
                        <input class="input-group" type="text" name="price" placeholder="Price">
                        <textarea class="input-group" name='info' rows='5' cols='20' placeholder="info"></textarea>
                        <input class="input-group" type="file" name="img">
                        <button type="submit" name="addup-submit">add up</button>
                    </form>
                    
                </div>
            </div>
    </div>
</main>