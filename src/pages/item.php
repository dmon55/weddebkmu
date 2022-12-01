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
                                <form method='post' enctype='multipart/form-data'>
                                    <input type='hidden' name='gid' value=".$g_id." />
                                    <button type='submit' class='buy'>Buy Now</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    ";
                }
            }else {
                $status="Please Login or Signup Before buy the product";
            }

            ?>
            <div class="message_box" style="margin:10px 0px;">
                        <?php echo $status; ?>
                        
                    </div>
            </div>
        </div>
    </div>

</main>