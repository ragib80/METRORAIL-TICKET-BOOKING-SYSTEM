<?php
session_start();
include('../models/db.php');
// if (!isset($_SESSION['email'])) {
//     header('Location: login.php');
// } else if (isset($_SESSION['email'])) {
//     if ($_SESSION['type'] == "Vendor") {
//         header('Location: VendorHome.php');
//     }
//     if ($_SESSION['type'] == "Admin") {
//         header('Location: AdminHome.php');
//     }
//     if ($_SESSION['type'] == "driver") {
//         header('Location: DriverHome.php');
//     }
// }
// $name = $_SESSION['name'];
// $email = $_SESSION['email'];

// $connection = new db();
// $conobj = $connection->OpenCon();
// $userQuery = $connection->ShowAll($conobj, "customer", $email);

// if ($userQuery->num_rows > 0) {
//     $row = mysqli_fetch_assoc($userQuery);
//     $_SESSION["customer_id"] = $row['customer_id'];
// } else {
//     $error = "Username or Password or type  is invalid";
// }
// $connection->CloseCon($conobj);

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
    <title>Customer Home</title>
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
                    <li class="nav-item"><a class="nav-link" href="./contactus.html"><span
                                class="fa fa-address-card fa-lg"></span> Contact</a></li>

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

    <?php
    if (isset($_SESSION['success'])) {
        echo ('<p id="msg">' . htmlentities($_SESSION['success']) . "</p>");
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo ('<p id="error">' . htmlentities($_SESSION['error']) . "</p>");
        unset($_SESSION['error']);
    }



    ?>
    <!-- main  -->
    <div class="container mb-5 mt-5">
        <div class="row row-header">
            <div class="col-12 col-sm-12">
                <h1>Welcome TO Metaverse</h1>
                <h3>
                    <?php echo "" . $_SESSION['username'] . " and your id: " . $_SESSION['userid']; ?> </h3>

            </div>
        </div>
        <div class="row row-header">
            <div class="col-12 col-sm-4">
                <img class="d-block img-fluid" src="Pictures/train-ticket.jpg" alt="mask">
                <a class="btn btn-primary m-2" href="TicketSearch.php">Book A Ticket</a>
            </div>
            <div class="col-12 col-sm-4">
                <img class="d-block img-fluid" src="Pictures/track.jpg" alt="sanitizer">
                <a class="btn btn-primary m-2" href="Location.php">Track A Train</a>
            </div>
            <div class="col-12 col-sm-4">
                <img class="d-block img-fluid" src="Pictures/ticket.jpg" alt="ticket">
                <a class="btn btn-primary m-2" href="PurchasedTicket.php">Purchased Ticket</a>
            </div>

        </div>
        <div class="row row-header">
            <div class="col-12 col-sm-3">
                <img class="d-block img-fluid" src="Pictures/complaints.jpg" alt="distance">
                <a class="btn btn-primary m-2" href="userComplain.php">Register Complain</a>
            </div>
            <div class="col-12 col-sm-3">
                <img class="d-block img-fluid" src="Pictures/complanit.jpg" alt="cough">
                <a class="btn btn-primary m-2" href="../views/PreviousComplain.php">Previous Complain</a>
            </div>

        </div>
    </div>
    <!-- main  -->
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