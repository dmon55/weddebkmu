<?php
    session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="js/bootstrap-dropdown.js"></script>
        <link rel="stylesheet" href="../css/App.css">
    </head>
    <body>
    <style>
        .jumbotron-fluid , .jumbotron , .list-group-item{
            background-color: #343434;
        }
        </style>
        <div class="container-fluid ">
            <div class="row ">
                <div class="col "></div>
                
                    <a href="../pages/News.php">
                        <img src="../images/Touhou_Logo.png" alt="touhou-project" class="logo" width="300" height="200" >
                    </a>
                </div>
                <div class="col">
                    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #343434  ;" >
                        <a class="navbar-brand" href="../pages/News.php" style="color:#FFFFFF ">GensokyoShop</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item ">
                                    <a class="nav-link btn-outline-success" href="../pages/intro.php" style="color:#FFFFFF " >Intro to Gensokyo</a>
                                </li> 
                                <li class="nav-item ">
                                    <a class="nav-link btn-outline-success" href="../pages/News.php" style="color:#FFFFFF " >News</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle btn-outline-success" href="#" id="navbarDropdown" style="color:#FFFFFF " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Store
                                    </a>
                                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="../pages/Touhoustore.php">Touhou</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../pages/gamestore.php">Other Game</a>
                                    </div>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link btn-outline-success" href="../pages/staff.php" style="color:#FFFFFF " >Staff</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link btn-outline-success disabled" href="#" style="color:#FFFFFF " >FAQ</a>
                                </li>
                                <?php
                                    if (isset($_SESSION['power'])) {
                                        if($_SESSION['power'] == "2"){
                                            echo'<li class="nav-item ">
                                                    <a class="nav-link btn-outline-success" href="../pages/additem.php" style="color:#FFFFFF " >Add Game</a>
                                                </li>';
                                        }
                                    }
                                ?>
                            </ul>
                                <?php
                                    if (isset($_SESSION['UserUnID'])) {
                                        $name = $_SESSION['UserUnID'];
                                        echo"<p>Welcome! $name </p>
                                        <a class='nav-link btn-outline-success' href='../pages/profile.php' style='color:#FFFFFF ' >Profile</a>
                                        <form action='../includes/logout.inc.php' method='post'>
                                        <button type='submit' name='logout-submit'>Logout</button>
                                        </form>";
                                    }else{
                                        echo'<form action="../includes/login.inc.php" method="post">
                                            <input type="text" name="username" placeholder="Username">
                                            <input type="password" name="pwd" placeholder="Password">
                                            <button type="submit" name="login-submit">Login</button>
                                        </form>
                                        <a class="nav-link btn-outline-success" style="color:#FFFFFF" href="signup.php" >Signup</a>';
                                    }
                                ?>
                            <form action="../pages/search.php" method="post" class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>  
                </div>
            </div>
        </div>
    
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>