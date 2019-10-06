<?php
    require 'header.php'
?>

<main>
    <style>
        body {
        background-image: url('../images/village.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;    
        }
        .input-group {
            /*height: 30px;*/
            width: 30%;
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
            <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "sqlerror") {
                        echo'<p class="error">The code was broken!';
                    }
                }else if(isset($_GET['set'])){
					if($_GET['set'] == "success"){
						echo'<p class="success">Add success!';
						}
				}
            ?>
                <h1 class="display-4">Add games</h1>
                <form action="../includes/additem.inc.php" method="post" enctype="multipart/form-data"><br> 
                    Game Name:<input class='input-group' type="text" name="gname" placeholder="Name"><br>
                    Price:<input class='input-group' type="number" name="price" placeholder="Price"><br>
                    <p>Info:</p>
                    <textarea name='info' rows='10' cols='50' ></textarea><br>
                    <p>Key:</p>
                    <textarea name='key' rows='10' cols='50' ></textarea><br>
                    <p>Picture:</p>
                    <input type="file" name="gpic" id='gpic' ><br>
                    Type:
                    <select name="type">
                        <option value="Classic">Classic</option>
                        <option value="Modern">Modern</option>
                        <option value="NewModern">NewModern</option>
                        <option value="Other">Other</option>
                    </select>
                    <br>
                    <button type="submit" name="addup-submit">Confirm</button>

                </form>
            </div>
        </div>
    </div>
</main>