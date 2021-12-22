<?php

session_start();
include('../models/db.php');
// if (!isset($_SESSION['email'])) {
//     die('Not logged in');
// }
if (isset($_POST['cancel'])) {
    // Redirect the browser to AdminHome.php
    header("Location: PreviousComplain.php");
    return;
}

// // Guardian: Make sure that complain_id is present
// if (!isset($_GET['complain_id'])) {
//     $_SESSION['error'] = "Missing complain id";
//     header('Location: AdminHome.php');
//     return;
// }


$complain_id = $_GET['COMPLAIN_ID'];
$connection = new db();
$conobj = $connection->OpenCon();


$userQuery = $connection->ShowComplainId($conobj, "complain", $complain_id);
oci_execute($userQuery);


while ($row = oci_fetch_assoc($userQuery)) {
    $COMPLAIN_ID = $row['COMPLAIN_ID'];
    $COMPLAIN_DESCRIPTION = $row['COMPLAIN_DESCRIPTION'];
    $COMPLAIN_TOPIC = $row['COMPLAIN_TOPIC'];
}
if (isset($_POST['delete'])) {

    $complain = $_POST['complainDetails'];
    $type = $_POST['type'];

    $conobj = $connection->OpenCon();
    $userQuery = $connection->DeleteComplain($conobj, "complain", $complain_id);
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
    <title>Available Ticket</title>


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
                    <li class="nav-item"><a class="nav-link" href="./aboutus.html"><span
                                class="fa fa-info fa-lg"></span> My Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="./contactus.html"><span
                                class="fa fa-address-card fa-lg"></span> Contact</a></li>

                    <li class="nav-item"><a class="nav-link" href="./contactus.html"><span
                                class="fa fa-address-card fa-lg"></span> Log Out</a></li>
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

    <!-- Login Modal Start -->
    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Location </h4>
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
    <section class="pad-70">
        <div class="container log-form-pos">
            <form method="post"><input type="hidden" name="COMPLAIN_ID" value="<?php echo $_GET['COMPLAIN_ID'] ?>">
                <h1>Confirm Deleting............. </h1>
                <h3>Complain ID: <?php echo $complain_id ?></h3>
                <h3>Complain DESCRIPTION: <?php echo $COMPLAIN_DESCRIPTION ?></h3>
                <h3>Complain Topic: <?php echo $COMPLAIN_TOPIC ?></h3>

                <input class="btn btn-lg btn-success" type="submit" value="Delete" name="delete">
                <input class="btn btn-lg btn-danger" type="submit" name="cancel" value="Cancel">
            </form>
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