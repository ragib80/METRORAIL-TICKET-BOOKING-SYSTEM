<?php
// session_start();
// include('../models/db.php');
require('../controllers/ValidationLogin.php');
// if (!isset($_SESSION['email'])) {
//     die('Not logged in');
// }

if (isset($_POST['cancel'])) {
    // Redirect the browser to CustomerHome.php
    header("Location: UserHome.php");
    return;
}

// Guardian: Make sure that pcar name is present
if (!isset($_GET['TICKET_ID'])) {
    $_SESSION['error'] = "Missing users id";
    header('Location: Search.php');
    return;
}
if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    return;
}
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
        header("location: ../views/PurchasedTicket.php");
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
                    <li class="nav-item active"><a class="nav-link" href="UserHome.php"><span
                                class="fa fa-home fa-lg"></span>
                            Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="UserProfile.php"><span
                                class="fa fa-info fa-lg"></span>
                            My
                            Profile</a></li>

                    <li class="nav-item"><a class="nav-link" href="logout.php"><span
                                class="fa fa-sign-out fa-lg"></span>
                            Log Out</a></li>
                </ul>
                <!-- Modal Login-->

                <!-- Modal Login -->
            </div>

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

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