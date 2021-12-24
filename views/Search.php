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
                    <li class="nav-item active"><a class="nav-link" href="Home.php"><span
                                class="fa fa-home fa-lg"></span>
                            Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./aboutus.html"><span
                                class="fa fa-info fa-lg"></span> About</a></li>

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
    <section>
        <div class="container mt-5">
            <h1>
                Available Ticket
            </h1>
            <div class="modal-body">
                <form class="form-check" id="ReserveTable" action="Search.php" method="POST">
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
                            <input type="text" class="form-control" id="date" name="date" placeholder="Date">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="offset-md-2 col-md-4">
                            <button type="submit" class="btn btn-primary btn-sm ml-1">Search A Ticket</button>
                            <input type="submit" value="Cancel" name="cancel" class="btn btn-sm btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <?php
            // session_start();
            include('../models/db.php');
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $from = $_REQUEST["from"];
                $to = $_REQUEST["to"];
                $date = $_REQUEST["date"];
                $connection = new db();
                $conobj = $connection->OpenCon();
                $userQuery = $connection->ShowTicket($conobj, "ticket", $from, $to, $date, "destination");
                oci_execute($userQuery);
                // $row = oci_fetch_assoc($userQuery);
                // if (oci_num_rows($userQuery) > 0) {
                echo "<table><tr><th>TICKET_NO</th><th>TICKET_DATE</th><th>TICKET_DESCRIPTION</th><th>TICKET_TIME</th><th>From</th><th>To</th><th>Action</th></tr>";
                // output data of each row
                // print_r($row);
                while ($row = oci_fetch_array($userQuery, OCI_RETURN_NULLS + OCI_ASSOC)) {
                    echo "<tr><td>" . $row["TICKET_NO"] . "</td><td>" . $row["TICKET_DATE"] . "</td><td>" . $row["TICKET_DESCRIPTION"] . "</td><td>" . $row["TICKET_TIME"] . "</td><td>" . $row["DESTINATION_FROM"] . "</td><td>" . $row["DESTINATION_TO"] . "</td><td>" . "<a class='btn btn-sm btn-primary pr-5' href='../views/ticket.php?TICKET_ID=" . $row["TICKET_ID"] . "'>View</a>" . "</td></tr>";
                }
                echo "</table>";
                $connection->CloseCon($conobj);
            } else if (isset($_POST['cancel'])) {
                // Redirect the browser to CustomerHome.php
                header("Location: Home.php");
                return;
            } else {
                echo "0 results";
            }

            ?>

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
</body>

</html>