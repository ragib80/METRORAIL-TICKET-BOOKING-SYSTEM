<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>User - Dashboard</title>
    <link href="../Asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../Asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../Asset/css/ruang-admin.min.css" rel="stylesheet">
    <link href="../Asset/css/table.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../asset/css/mycss.css">
    <title>Ticket Location</title>
</head>

<body id="page-top">
    <?php session_start(); ?>
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminDashboard.php">
                <div class="sidebar-brand-icon">
                    <img src="../Asset/images/logo2.png">
                </div>
                <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="adminDashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard| </span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">

                <a class='btn btn-outline-danger' href='logout.php'> Logout </a>
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa-fw fa-window-maximize"></i>
                    <span>Booking Tickets</span>
                </a>

                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Bootstrap UI</h6>
                        <a class="collapse-item" href="alerts.html">Alerts</a>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="dropdowns.html">Dropdowns</a>
                        <a class="collapse-item" href="modals.html">Modals</a>
                        <a class="collapse-item" href="popovers.html">Popovers</a>
                        <a class="collapse-item" href="progress-bar.html">Progress Bars</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="PurchasedTicketHistory.php" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true" aria-controls="collapseForm">
                    <i class="fab fa-fw fa-wpforms"></i>
                    <span>Purchased Tickets </span>
                </a>
                <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Forms</h6>
                        <a class="collapse-item" href="form_basics.html">Form Basics</a>
                        <a class="collapse-item" href="form_advanceds.html">Form Advanceds</a>
                    </div>

                </div>

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="admin_trainTrak.php" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Track Train</span>
                </a>
                <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tables</h6>
                        <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
                        <a class="collapse-item" href="datatables.html">DataTables</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ui-colors.html">
                    <i class="fas fa-fw fa-palette"></i>
                    <span>Previous Journey</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Complains
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="complaindetails.php" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
                    <i class="fas fa-fw fa-columns"></i>
                    <span>View Complain</span>
                </a>
                <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Example Pages</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Previous Complain</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="version" id="version-ruangadmin"></div>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">

                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">




                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="../Asset/images/boy.png" style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo "Logged in as " . $_SESSION['username']; ?></span>
                            </a>

                        </li>
                    </ul>
                </nav>
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
                <script src="js/ruang-admin.min.js"></script>
                <script src="vendor/chart.js/Chart.min.js"></script>
                <script src="js/demo/chart-area-demo.js"></script>
                <section>
                    <div class="container mt-5">
                        <h1>
                            Train Location
                        </h1>
                        <div class="modal-body">
                            <form class="form-check" id="ReserveTable" action="admin_trainTrak.php" method="POST">
                                <div class="form-group row">
                                    <label for="from" class="col-12 col-md-2 col-form-label">Train No: </label>
                                    <div class="col-7 col-md-10">
                                        <input type="text" class="form-control" id="trainNo" name="trainNo" placeholder="Train No:">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-md-2 col-md-4">
                                        <button type="submit" class="btn btn-primary btn-sm ml-1">Search Location</button>
                                        <a href="adminDashboard.php" class="btn btn-sm btn-primary">Cancel</a>


                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                        // session_start();

                        include('../models/db.php');
                        $connection = new db();
                        $conobj = $connection->OpenCon();
                        if (isset($_POST['cancel'])) {
                            // Redirect the browser to CustomerHome.php
                            header("Location: adminDashboard.php");
                            return;
                        }
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $trainNo = $_POST['trainNo'];
                            $userQuery = $connection->ShowLocation($conobj, "trainLocation", $trainNo);
                            oci_execute($userQuery);
                            // $row = oci_fetch_assoc($userQuery);
                            // if (oci_num_rows($userQuery) > 0) {
                            echo "<table><tr><th>LOCATION_ID</th><th>TRAIN_NO</th><th>TRAIN_LOCATION</th><th>TRAIN_DEPATURE</th></tr>";
                            // output data of each row
                            // print_r($row);
                            while ($row = oci_fetch_array($userQuery, OCI_RETURN_NULLS + OCI_ASSOC)) {
                                echo "<tr><td>" . $row["LOCATION_ID"] . "</td><td>" . $row["TRAIN_NO"] . "</td><td>" . $row["TRAIN_LOCATION"] .
                                    "</td><td>" . $row["TRAIN_DEPATURE"] . "</td></tr>";
                            }
                            echo "</table>";
                            $connection->CloseCon($conobj);
                        }
                        ?>

                    </div>
                </section>
</body>

</html>