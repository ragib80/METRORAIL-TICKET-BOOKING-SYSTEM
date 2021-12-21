 <?php
    include('../controllers/ValidationLogin.php');

    // if (isset($_SESSION['email'])) {
    //     if ($_SESSION["type"] == "customer") {
    //         header('Location: CustomerHome.php');
    //     }
    //     if ($_SESSION["type"] == "Vendor") {
    //         header('Location: VendorHome.php');
    //     }
    //     if ($_SESSION["type"] == "Admin") {
    //         header('Location: AdminHome.php');
    //     }
    //     if ($_SESSION["type"] == "driver") {
    //         header('Location: DriverHome.php');
    //     }
    // }
    //  else {
    //     header('Location: login.php');
    // }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" type="text/css" href="../asset/css/mycss.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
         integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="../asset/css/styles.css">
     <title>Login</title>


 </head>

 <body>
     <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
         <div class="container">
             <a class="navbar-brand mr-auto" href="#"><img src="Pictures/icon.jpg" height="30" width="41"></a>
             <div class="collapse navbar-collapse" id="Navbar">
                 <ul class="navbar-nav mr-auto">
                     <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span>
                             Home</a></li>
                     <li class="nav-item"><a class="nav-link" href="./aboutus.html"><span
                                 class="fa fa-info fa-lg"></span> About</a></li>
                     <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-list fa-lg"></span> Menu</a>
                     </li>
                     <li class="nav-item"><a class="nav-link" href="./contactus.html"><span
                                 class="fa fa-address-card fa-lg"></span> Contact</a></li>
                 </ul>
                 <!-- Modal Login-->
                 <!-- Modal Login -->
             </div>

         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
             <span class="navbar-toggler-icon"></span>
         </button>
     </nav>


     <section class="pad-70">
         <div class="container log-form-pos">
             <h1>Login</h1>
             <img src=" Pictures/login1.jpg" alt="login">
             <?php
                // Note triple not equals and think how badly double
                // not equals would work here...
                if ($error !== false) {
                    // Look closely at the use of single and double quotes
                    echo ('<p style="color: red;" class="col-sm-10 col-sm-offset-2">' .
                        htmlentities($error) .
                        "</p>\n");
                }
                ?>
             <p id="error">
             </p>
             <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validateLoginForm()" method="post">
                 <div class="form-row">
                     <div class="form-group center">
                         Email:
                         <input type="text" name="email" id="email" class="form-control">
                     </div>
                 </div>
                 <div class="form-row">
                     <div class="form-group center">
                         Password:
                         <input type="password" name="pass" id="pass" class="form-control">
                     </div>
                 </div>
                 <div class="form-row">
                     <div class="form-group center">
                         <input type="submit" id="loginButton" value="Login" name="login"
                             class="btn btn-lg btn-primary btn-submit">
                     </div>
                 </div>
         </div>
         </form>
         </div>
         <div class="center">
             <h2>If you are new user</h2>
             <a class="btn btn-lg btn-primary ml-5" href="registration.php">Register Now!!</a>
         </div>
     </section>
     <!-- footer  -->
     <footer>
         <div class="container footer-wrap">
             <div class="footer-left">
                 <ul class="footer-menu">
                     <li><a href="">Terms and Conditions</a></li>
                     <li><a href="">Privacy</a></li>
                 </ul>

             </div>
             <div class="footer-right">
                 <ul class="footer-menu">
                     <li><a href="">Follow</a></li>
                     <li><a href=""><i class="fab fa-facebook"></i></a></li>
                     <li><a href=""><i class="fab fa-twitter"></i></a></li>
                     <li><a href=""><i class="fab fa-instagram"></i></a></li>

                 </ul>
             </div>
         </div>
     </footer>
     <!-- footer  -->
     <script src="https://kit.fontawesome.com/2065a5e896.js" crossorigin="anonymous"></script>
 </body>

 </html>