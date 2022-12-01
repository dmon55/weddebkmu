<?php
    require "header.php";
?>
<?php
$status="";
//unset($_SESSION["shopping_cart"]); # emergency code
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	$gid = $_POST["gid"];
	$gtype = $_POST["type"];
	$g_code = $gtype . strval($gid);
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($g_code == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"])){
		unset($_SESSION["shopping_cart"]);
				}
			}		
		} 
}



if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['gid'] === $_POST["gid"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html>
	<head>
		<title>Shopping Cart</title>
		<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
	</head>
	<body>
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
		<div class="container">
    		<div class="jumbotron jumbotron-fluid">
        		<div class="container">
					<div style="width:700px; margin:50 auto;">

						<h2>Shopping Cart</h2>   

						<?php
							if(!empty($_SESSION["shopping_cart"])) {
							$cart_count = count(array_keys($_SESSION["shopping_cart"]));
						?>
						<div class="cart_div">
							<a href="cart.php">
							<img src="../images/cart-icon.png"/> Cart
							<span><?php echo $cart_count; ?></span></a>
						</div>
						<?php
						}
						?>
              
						<div class="cart">
							<?php
								if(isset($_SESSION["shopping_cart"])){
									$total_price = 0;
							?>	
							<table class="table">
								<tbody>
									<tr>
										<td></td>
										<td>ITEM NAME</td>
										<td>QUANTITY</td>
										<td>UNIT PRICE</td>
										<td>ITEMS TOTAL</td>
									</tr>	
									<?php		
										foreach ($_SESSION["shopping_cart"] as $gamelist){
									?>
									<tr>
										<td><img src='../uploaded/<?php echo $gamelist["type"]?>/<?php echo $gamelist["image"]?>' width="50" height="40" /></td>
										<td><?php echo $gamelist["gname"]; ?><br />
											<form method='post' action=''>
												<input type='hidden' name='gid' value="<?php echo $gamelist["gid"]; ?>" />
												<input type='hidden' name='type' value="<?php echo $gamelist["type"]; ?>" />
												<input type='hidden' name='action' value="remove" />
												<button type='submit' class='remove'>Remove Item</button>
											</form>
										</td>
										<td>
											<form method='post' action=''>
												<input type='hidden' name='gid' value="<?php echo $gamelist["gid"]; ?>" />
												<input type='hidden' name='action' value="change" />
												<select name='quantity' class='quantity' onchange="this.form.submit()">
													<option <?php if($gamelist["quantity"]==1) echo "selected";?> value="1">1</option>
													<option <?php if($gamelist["quantity"]==2) echo "selected";?> value="2">2</option>
													<option <?php if($gamelist["quantity"]==3) echo "selected";?> value="3">3</option>
													<option <?php if($gamelist["quantity"]==4) echo "selected";?> value="4">4</option>
													<option <?php if($gamelist["quantity"]==5) echo "selected";?> value="5">5</option>
												</select>
											</form>
										</td>
										<td><?php echo "$".$gamelist["price"]; ?></td>
										<td><?php echo "$".$gamelist["price"]*$gamelist["quantity"]; ?></td>
									</tr>
									<?php
										$total_price += ($gamelist["price"]*$gamelist["quantity"]);
										}
									?>
									<tr>
										<td colspan="5" align="right">
											<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
											<form action="../includes/order.inc.php" name ="con" method="post">
												<input type='hidden' name='uid' value="<?php echo $_SESSION['UserUID'];?>"/>
												<button type='submit' class='order'>confirm order</button>
											</form>
										</td>
									</tr>
								</tbody>
                
							</table>

							<?php
								}else{
									echo "<h3>Your cart is empty!</h3>";
								}
							?>
						</div>

						<div style="clear:both;"></div>

						<div class="message_box" style="margin:10px 0px;">
							<?php echo $status; ?>
						</div>
						<br /><br />
					</div>
				</div>
            </div>
            
		</div>
	</body>

</html>
