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

    <?php
    session_start();
    if (isset($_SESSION['success'])) {
        echo ('<p id="msg">' . htmlentities($_SESSION['success']) . "</p>");
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo ('<p id="error">' . htmlentities($_SESSION['error']) . "</p>");
        unset($_SESSION['error']);
    }



    ?>


    <!-- main -->
    <section>
        <div class="container mt-5">
            <h1>
                Available Ticket
            </h1>
            <div class="modal-body">
                <form class="form-check" id="ReserveTable" action="TicketSearch.php" method="POST">
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

            include('../models/db.php');
                        if (isset($_POST['cancel'])) {
                            // Redirect the browser to CustomerHome.php
                            header("Location: UserHome.php");
                            return;
                        }
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
                    echo "<tr><td>" . $row["TICKET_NO"] . "</td><td>" . $row["TICKET_DATE"] . "</td><td>" . $row["TICKET_DESCRIPTION"] . "</td><td>" . $row["TICKET_TIME"] . "</td><td>" . $row["DESTINATION_FROM"] . "</td><td>" . $row["DESTINATION_TO"] . "</td><td>" . "<a href='../views/ticket.php?TICKET_ID=" . $row["TICKET_ID"] . "' class='btn btn-primary btn-sm ml-1 pr-5'>View</a>" . "</td></tr>";
                }
                echo "</table>";
                $connection->CloseCon($conobj);
            } else {
                echo "0 results";
            }

            ?>
            <div class="row row-header">
                <div class="col-12 col-sm-12">
                    <h1>Welcome TO Metaverse</h1>
                    <h3>
                        <?php echo "" . $_SESSION['username'] . " and your id: " . $_SESSION['userid']; ?> </h3>

                </div>
            </div>
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