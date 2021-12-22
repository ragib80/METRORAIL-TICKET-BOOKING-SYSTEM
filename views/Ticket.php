<?php
// session_start();
// include('../models/db.php');
require('../controllers/ValidationLogin.php');
// if (!isset($_SESSION['email'])) {
//     die('Not logged in');
// }

if (isset($_POST['cancel'])) {
    // Redirect the browser to CustomerHome.php
    header("Location: Search.php");
    return;
}

// // Guardian: Make sure that pcar name is present
// if (!isset($_GET['users_id'])) {
//     $_SESSION['error'] = "Missing users id";
//     header('Location: Home.php');
//     return;
// }
// include('../models/db.php');
// $TICKET_ID = $_GET["TICKET_ID"];
// $connection = new db();
// $conobj = $connection->OpenCon();
// // $customer_id = $_SESSION["customer_id"];

// $userQuery = $connection->ShowRequestedTicket($conobj, "ticket", $TICKET_ID, "payment");
// $r = oci_execute($userQuery);

// if (isset($_POST['update'])) {
//     $connection = new db();
//     $conobj = $connection->OpenCon();
//     $connection->InsertPaymentRequest($conobj, "payment", $PAYMENT_ID, $PAYMENT_DESCRIPTION, $PAYMENT_AMOUNT, $USERS_ID);
//     $connection->CloseCon($conobj);
//     $_SESSION['success'] = "Request Successful";
//     header("Location: UserHome.php");
//     return;
// }
// if ($r) {

//     $row = oci_fetch_assoc($userQuery);
//     // print_r($row);
//     $TICKET_ID = $row['TICKET_ID'];
//     $TICKET_NO = $row['TICKET_NO'];
//     $TICKET_DATE = $row['TICKET_DATE'];
//     $TICKET_DESCRIPTION = $row['TICKET_DESCRIPTION'];
//     $TICKET_TIME = $row['TICKET_TIME'];
//     $DESTINATION_FROM = $row['DESTINATION_FROM'];
//     $DESTINATION_TO = $row['DESTINATION_TO'];
//     $PAYMENT_AMOUNT = $row['PAYMENT_AMOUNT'];
//     $USERS_ID = $_SESSION['userid'];
// } else {
//     $_SESSION['error'] = "Request UnSuccessful";
//     header("Location: Home.php");
//     return;
// }


require_once('../models/db.php');
$connection = new db();
$TICKET_ID = $_GET["TICKET_ID"];
$connection = new db();
$conobj = $connection->OpenCon();
// $customer_id = $_SESSION["customer_id"];

$userQuery = $connection->ShowRequestedTicket($conobj, "ticket", $TICKET_ID, "payment");
$r = oci_execute($userQuery);
$row = oci_fetch_assoc($userQuery);
// print_r($row);
$TICKET_ID = $row['TICKET_ID'];
$TICKET_NO = $row['TICKET_NO'];
$TICKET_DATE = $row['TICKET_DATE'];
$TICKET_DESCRIPTION = $row['TICKET_DESCRIPTION'];
$TICKET_TIME = $row['TICKET_TIME'];
$DESTINATION_FROM = $row['DESTINATION_FROM'];
$DESTINATION_TO = $row['DESTINATION_TO'];
$PAYMENT_AMOUNT = $row['PAYMENT_AMOUNT'];
$USERS_ID = $_SESSION['userid'];
 $PAYMENT_DESCRIPTION = $row['PAYMENT_DESCRIPTION'];
if (isset($_POST['proceed'])) {
    $TICKET_ID = $row['TICKET_ID'];
    $TICKET_NO = $row['TICKET_NO'];
    $TICKET_DATE = $row['TICKET_DATE'];
    $TICKET_DESCRIPTION = $row['TICKET_DESCRIPTION'];
    $TICKET_TIME = $row['TICKET_TIME'];
    $DESTINATION_FROM = $row['DESTINATION_FROM'];
    $DESTINATION_TO = $row['DESTINATION_TO'];
    $PAYMENT_AMOUNT = $row['PAYMENT_AMOUNT'];
    $PAYMENT_DESCRIPTION = $row['PAYMENT_DESCRIPTION'];
    $USERS_ID = $_SESSION['userid'];
    // $complain = $_POST['complainDetails'];
    // $type = $_POST['type'];

    $conobj = $connection->OpenCon();
    $userQuery = $connection->InsertPaymentRequest($conobj, "payment", $PAYMENT_ID, $PAYMENT_DESCRIPTION, $PAYMENT_AMOUNT, $USERS_ID);
    $r = oci_execute($userQuery);
    // $row = oci_fetch_assoc($userQuery);
    // print_r($row);
    if ($r) {
        // $_SESSION["username"] = $row['ADMIN_EMAIL'];
        // $_SESSION["userid"] = $row['ADMIN_ID'];

        // $_SESSION["email"] = $row['EMAIL'];
        // $_SESSION["pass"] = $row['PASSWORD'];
        header("location: ../views/PreviousComplain.php");
        // $_SESSION['success'] = "Login Successful";
    } else {
        $error = "Username or Password is invalid";
    }


    // header("../views/PreviousComplain.php");
    $connection->CloseCon($conobj);
}
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
    <title>Ticket Profile</title>


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

    <!-- main -->
    <section class="pad-70 right m-5 ">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-12">
                    <h1>Welcome TO Metaverse</h1>
                    <h3>
                        <?php echo "" . $_SESSION['username'] . " and your id: " . $_SESSION['userid']; ?> </h3>

                </div>
            </div>
            <div class="row">
                <div class="post post-right">
                    <br>
                    TICKET ID: <?php echo $TICKET_ID; ?>
                    <hr>
                    TICKET NO: <?php echo $TICKET_NO; ?>
                    <hr>
                    TICKET DATE: <?php echo $TICKET_DATE; ?>
                    <hr>
                    TICKET DESCRIPTION: <?php echo $TICKET_DESCRIPTION; ?>
                    <br>
                </div>
                <div class="post post-left ml-3">
                    <br>
                    TICKET Price: <?php echo $PAYMENT_AMOUNT; ?> Taka
                    <hr>
                    DESTINATION FROM: <?php echo $DESTINATION_FROM; ?>
                    <hr>
                    DESTINATION To: <?php echo $DESTINATION_TO; ?>
                    <hr>
                    TICKET Time: <?php echo $TICKET_TIME; ?>
                    <br>
                </div>

            </div>
            <form action='' method='post'>
                <h2>Do you want to Request It?</h2>
                <div class="form-row">
                    <div class="form-group">
                        <input type="submit" value="Proceed" name="proceed" class="btn btn-lg btn-primary">
                        <input type="submit" value="Cancel" name="cancel" class="btn btn-lg btn-primary">
                    </div>
                </div>

            </form>
        </div>
    </section>


    <!-- main -->
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
</body>

</html>