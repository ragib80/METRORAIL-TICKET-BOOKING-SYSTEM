<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../asset/css/mycss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../asset/css/styles.css">
    <title>Complain Action</title>
</head>

<body>
    <?php

    require_once('adminTopNav.php');
    if (isset($_POST['back'])) {
        // Redirect the browser to AdminHome.php
        header("Location: complaindetails.php");
        return;
    }
    ?>
    <table class="table table-bordered">
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

            </div>
            <?php

            include('../models/db.php');

            // if (!isset($_SESSION['email'])) {
            //     die('Not logged in');
            // }


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
                $USER_ID = $row['USERS_ID'];
                $COMPLAIN_TOPIC = $row['COMPLAIN_TOPIC'];
                $STATUS = $row['STATUS'];
            }

            // header("../views/PreviousComplain.php");
            $connection->CloseCon($conobj);


            ?>
            <section class="pad-70">
                <div class="container log-form-pos">
                    <form method="post"><input type="hidden" name="COMPLAIN_ID" value="<?php echo $_GET['COMPLAIN_ID'] ?>">
                        <h1>Complain View </h1>
                        <h3>Complain ID: <?php echo $complain_id ?></h3>
                        <h3>Complain DESCRIPTION: <?php echo $COMPLAIN_DESCRIPTION ?></h3>
                        <h3>Complain Topic: <?php echo $COMPLAIN_TOPIC ?></h3>
                        <h3>User_id: <?php echo $USER_ID ?></h3>
                        <h3>Complain Status: <?php echo $STATUS ?></h3>

                        <a href="complaindetails.php" class="btn btn-lg btn-success">Back </a>

                    </form>
                </div>
            </section>
        </div>
</body>

</html>