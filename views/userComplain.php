<?php
require_once('../models/db.php');
$connection = new db();

if (isset($_POST['submit'])) {

    $complain = $_POST['complainDetails'];
    $type = $_POST['type'];

    $conobj = $connection->OpenCon();
    $userQuery = $connection->InsertComplain($conobj, "complain", $complain, $type);
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
        <div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
    </nav>
    <div class="container-fluid m-5" id="container-wrapper">
        <form method="post" action="">
            <div class="form-group">
                <!--<input type="hidden" name="username" id="actionResult" value="<//?php $user; ?>" /> -->
                <label for="exampleFormControlSelect1">Complain type</label>
                <select class="form-control" id="exampleFormControlSelect1" name="type">
                    <option value="Ticket Issue">Ticket Issue</option>
                    <option value="Service">Service</option>
                    <option value="Other">Other</option>

                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Complain description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                    name="complainDetails"></textarea>
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="submit">
        </form>
    </div>
    </div>
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