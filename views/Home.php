 <?php
    include('../controllers/ValidationLogin.php');

    // if (isset($_SESSION['email'])) {
    //     if (isset($_SESSION["type"]) == "customer") {
    //         header('Location: CustomerHome.php');
    //     }
    //     if (isset($_SESSION["type"]) == "vendor") {
    //         header('Location: VendorHome.php');
    //     }
    // } else {
    //     header('Location: login.php');
    // }
    // if (isset($_SESSION["type"]) == "customer") {
    //     header('Location: CustomerHome.php');
    // } else if (isset($_SESSION["type"]) == "vendor") {
    //     header('Location: VendorHome.php');
    // }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" type="text/css" href="../asset/css/mycss.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
         integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="../asset/css/styles.css">

     <title>Home</title>
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
                 <span class="navbar-text">
                     <!-- <a data-toggle="modal" data-target="#loginModal"> -->
                     <a role="button" id="login">

                         <span class="fa fa-sign-in"></span> Login</a>
                 </span>
                 <!-- Modal Login -->
             </div>

         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
             <span class="navbar-toggler-icon"></span>
         </button>
     </nav>

     <!-- Login Modal Start -->
     <div id="loginModal" class="modal fade" role="dialog">
         <div class="modal-dialog modal-lg" role="content">
             <!-- Modal content-->
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Login </h4>
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                     <button type="button" class="close" id="hidel">&times;</button>
                 </div>
                 <div class="modal-body">
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
                     <form method="post">
                         <div class="form-row">
                             <div class="form-group col-sm-4">
                                 <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                 <input type="email" name="email" id="email" class=" form-control form-control-sm mr-1"
                                     id="exampleInputEmail3" placeholder="Enter email">
                             </div>
                             <div class="form-group col-sm-4">
                                 <label class="sr-only" for="exampleInputPassword3">Password</label>
                                 <input type="password" name="pass" id="pass" class="form-control form-control-sm mr-1"
                                     id="exampleInputPassword3" placeholder="Password">
                             </div>
                             <div class="col-sm-auto">
                                 <div class="form-check">
                                     <input class="form-check-input" type="checkbox">
                                     <label class="form-check-label"> Remember me
                                     </label>
                                 </div>
                             </div>
                         </div>
                         <div class="form-row">
                             <button type="button" class="btn btn-secondary btn-md ml-auto"
                                 data-dismiss="modal">Cancel</button>
                             <button type="submit" id="loginButton" value="Login" name="login"
                                 class="btn btn-primary btn-md ml-1">Log in</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <!--Login  Modal End -->
     <!-- Reserve Modal Start -->
     <div id="reserveModal" class="modal fade" role="dialog">
         <div class="modal-dialog modal-lg" role="content">
             <!--Reserve  Modal content-->
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Search A Ticket</h4>
                     <button type="button" class="close" id="hider">&times;</button>
                 </div>
                 <div class="modal-body">
                     <form class="form-check" id="ReserveTable" action="Search.php">
                         <div class="form-group row">
                             <label for="from" class="col-12 col-md-2 col-form-label">From</label>
                             <div class="col-7 col-md-10">
                                 <input type="text" class="form-control" id="from" name="from" placeholder="From">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="from" class="col-12 col-md-2 col-form-label">To</label>
                             <div class="col-7 col-md-10">
                                 <input type="text" class="form-control" id="to" name="to" placeholder="To">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="dateandtime" class="col-md-2 col-form-label">Date</label>
                             <div class="col-md-5">
                                 <input type="date" class="form-control" id="date" name="date" placeholder="Date">
                             </div>

                         </div>
                         <div class="form-group row">
                             <div class="offset-md-2 col-md-4">
                                 <button type="submit" class="btn btn-primary btn-sm ml-1">Search A Ticket</button>
                                 <button type="button" class="btn btn-secondary btn-sm ml-auto"
                                     data-dismiss="modal">Cancel</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <!--Reserve Modal End -->
     <header class="jumbotron">
         <div class="container">
             <div class="row row-header">
                 <div class="col-12 col-sm-8">
                     <h1>Welcome To Metro Rail Bangladesh</h1>
                     <p>In a view to implement Dhaka City's 20-year long Strategic Transport (STP), Bangladesh
                         Government invited Japan International Cooperation Agency (JICA) to conduct a primary survey
                         and feasibility study on the transport system of Dhaka back in 2009–2010. In 2012 the
                         Government's Executive Committee of National Economic Council (ECNEC) approved the project. A
                         loan agreement between Bangladesh Government and JICA was signed in January 2013. The same
                         year, Dhaka Mass Transit Company Ltd. (DMTC), the implementing agency of MRT Line-6 project was
                         formed. The General Consultant (GC) namely the NKDM Association commenced work from February
                         2014. In June 2013, Dhaka Mass Transit Company Limited (DMTC) was established by the Government
                         to implement the Metro Rail Lines across the city.</p>
                 </div>

                 <div class="col-12 col-sm-4 align-self-center">
                     <a role="button" class="btn btn-block btn-sm nav-link btn-warning" id="reserve">Search A Ticket</a>
                     <!-- <a role="button" class="btn btn-block btn-sm nav-link btn-warning"  data-toggle="modal" data-target="#reserveModal" href="#ReserveTable">Reserve Table</a> -->
                     <!-- <a role="button" class="btn btn-block btn-sm nav-link btn-warning"  data-toggle="tooltip" data-html="true"  title="Or Call us at  <br><strong>+852 12345678</strong>" data-placement="bottom" href="#ReserveTable">Reserve Table</a> -->
                 </div>
             </div>
         </div>
     </header>


     <div class="container">
         <div class="row row-content">
             <div class="col">
                 <div id="mycarousel" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner" role="listbox">
                         <div class="carousel-item active">
                             <img class="img-fluid" src="Pictures/Dhaka-Metro-Mass-Rapid-Transit-System.jpg"
                                 alt="metro rail">

                         </div>
                         <div class="carousel-item">
                             <img class="d-block img-fluid" src="Pictures/metro1.jpg" alt="metro rail">

                         </div>
                         <div class="carousel-item">
                             <img class="d-block img-fluid" src="Pictures/metro2.png" alt="metro rail">


                         </div>
                         <ol class="carousel-indicators">
                             <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                             <li data-target="#mycarousel" data-slide-to="1"></li>
                             <li data-target="#mycarousel" data-slide-to="2"></li>
                         </ol>
                         '

                         <button class="btn btn-danger btn-sm" id="carouselButton">
                             <span id="carousel-button-icon" class="fa fa-pause"></span>
                         </button>


                     </div>


                 </div>

             </div>
         </div>
     </div>

     <div class="container mb-5">
         <div class="row row-header">
             <div class="col-12 col-sm-12">
                 <h1>THings To Maintain</h1>

             </div>
         </div>
         <div class="row row-header">
             <div class="col-12 col-sm-3">
                 <img class="d-block img-fluid" src="Pictures/mask.jpg" alt="mask">
             </div>
             <div class="col-12 col-sm-3">
                 <img class="d-block img-fluid" src="Pictures/sanitizer.jpg" alt="sanitizer">

             </div>
             <div class="col-12 col-sm-3">
                 <img class="d-block img-fluid" src="Pictures/distance.png" alt="distance">

             </div>
             <div class="col-12 col-sm-3">
                 <img class="d-block img-fluid" src="Pictures/cough.png" alt="cough">

             </div>
         </div>
     </div>
     <!-- footer -->
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
     <!-- footer -->
     <script src="https://kit.fontawesome.com/2065a5e896.js" crossorigin="anonymous"></script>
     <!-- jQuery first, then Popper.js, then Bootstrap JS. -->

     <!-- build:js js/main.js -->

     <script src="../asset/js/scripts.js"></script>
     <!-- endbuild -->
     <!-- JavaScript Bundle with Popper -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
         integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
     </script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
         integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
     </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
         integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
     </script>
 </body>

 </html>