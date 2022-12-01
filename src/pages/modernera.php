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
                        $status="";
                        if (isset($_POST['gid']) && $_POST['gid']!=""){
                            $g_id_array = $_POST['gid'];
                            $cartresult = mysqli_query($conn,"SELECT * FROM `gamelist` WHERE `gid`='$g_id_array'");
                            $cartrow = mysqli_fetch_assoc($cartresult);
                            $g_id_array      = $cartrow['gid'];
                            $g_name_array   = $cartrow["gname"];
                            $g_price_array   = $cartrow["price"];
                            $g_img_array     = $cartrow['gimg'];
                            $g_type_array    = $cartrow['type'];

                            $g_code =$g_type_array . strval($g_id_array);

                            $cartArray = array(
                                $g_code=>array(
                                'gname'=>$g_name_array,
                                'gid'=>$g_id_array,
                                'price'=>$g_price_array,
                                'quantity'=>1,
                                'type'=>$g_type_array,
                                'image'=>$g_img_array)
                            );

                            if(empty($_SESSION["shopping_cart"])) {
                                $_SESSION["shopping_cart"] = $cartArray;
                                $status = "<div class='box'>Product is added to your cart!</div>";
                            }else{
                                $array_keys = array_keys($_SESSION["shopping_cart"]);
                                if(in_array($g_code,$array_keys)) {
                                $status = "<div class='box' style='color:red;'>
                                Product is already added to your cart!</div>";	
                                } else {

                                $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
                                $status = "<div class='box'>Product is added to your cart!</div>";
                                }

                            }
                            
                            
                        }
                        
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
                                            <form method='post' enctype='multipart/form-data'>
                                                <input type='hidden' name='gid' value=".$row['gid']." />
                                                <button type='submit' class='buy'>Buy Now</button>
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
                        <?php
                            if(!empty($_SESSION["shopping_cart"])) {
                                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                            ?>
                            <div class="cart_div">
                                <a href="cart.php"><img src="../images/cart-icon.png" /> Cart<span>
                                <?php echo $cart_count; ?></span></a>
                            </div>
                            <?php
                            }
                        ?>
                        
                    </div>
                    <div style="clear:both;"></div>
                    <div class="message_box" style="margin:10px 0px;">
                        <?php echo $status; ?>
                        
                    </div>
                </div>
            </div>
        </div>
</main>
        
