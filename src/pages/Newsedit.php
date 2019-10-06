<?php
if (isset($_POST['news-submit'])) {
    require 'header.php';
}else{
    header("Location: ../pages/News.php");
     exit();
}
?>

<main>
<style>
    body {
            background-image: url('../images/bg2.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;    
        }
        .input-group {
            /*height: 30px;*/
            width: 100%;
            margin: 10px 0px 10px 0px;	
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
        }
    </style>
<br>
        <div class="container">
            <div class="jumbotron ">
                    <h1 class="display-4">Update</h1>
                        <?php
                            require '../includes/dbh.inc.php';
                            $sql = "SELECT info FROM newsbox";
                            $result = mysqli_query($conn,$sql);
                            $fetcharr = mysqli_fetch_array($result);
                            $name = $fetcharr['info'];
                            echo "<form action='../includes/news.inc.php' method='post'>
                                    <textarea class='input-group' name='newsinfo' rows='20' cols='50' >$name
                                    </textarea> <br>
                                    <button type='submit' name='NewsEdit-submit'>Edit</button>
                                </form>";
                        ?>  
            </div>
            
        </div>

</main>