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
.header,.warpper-main  {
	width: 40%;
	margin: 50px auto 0px;
	color: white;
	background: #5F9EA0;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}
.sign, .content {
	width: 40%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
}
.input-group {
	height: 30px;
	width: 150%;
	margin: 10px 0px 10px 0px;	
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
#user_type {
	height: 40px;
	width: 98%;
	padding: 5px 10px;
	background: white;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
}
.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}
.profile_info img {
	display: inline-block; 
	width: 50px; 
	height: 50px; 
	margin: 5px;
	float: left;
}
.profile_info div {
	display: inline-block; 
	margin: 5px;
}
.profile_info:after {
	content: "";
	display: block;
	clear: both;
}
</style>
    <div class="warpper-main">
        <section class="btn">
            <h1>Signup</h1>
            <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo'<p class="error">Fill in all the fields!';
                    }else if ($_GET['error'] == "invalidmailuid") {
                        echo'<p class="error">Invalid Username and E-mail!';
                    }else if ($_GET['error'] == "invalidmail") {
                        echo'<p class="error">Invalid E-mail!';
                    }else if ($_GET['error'] == "invaliduid") {
                        echo'<p class="error">Invalid Username!';
                    }else if ($_GET['error'] == "passwordcheck") {
                        echo'<p class="error">Your Password do not match!';
                    }else if ($_GET['error'] == "usertaken") {
                        echo'<p class="error">User is already taken!';
                    }else if ($_GET['error'] == "sqlerror") {
                        echo'<p class="error">Call Admin for help!';
                    }
                }else if(isset($_GET['signup'])){
					if($_GET['signup'] == "success"){
						echo'<p class="success">Signup success!';
						}
				}
            ?>
            <form action="../pages/confirmsignup.php" method="post">
                <input class="input-group" type="text" name="uname" placeholder="Username">
                <input class="input-group" type="text" name="mail" placeholder="E-mail">
                <input class="input-group" type="password" name="pwd" placeholder="Password">
                <input class="input-group" type="password" name="pwd-repeat" placeholder="Repeat Password">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
        </section>
    </div>
</main>

<?php
    require "footer.php";
?>