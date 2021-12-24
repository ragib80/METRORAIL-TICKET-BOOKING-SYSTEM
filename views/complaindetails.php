<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../asset/css/mycss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../asset/css/styles.css">
    <title>Complain Details</title>
</head>

<body>
    <?php
    require_once('adminTopNav.php');
    ?>
    <table class="table table-bordered">
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

            </div>

            <section>
                <div class="container mt-5">
                    <h1>
                        All Complains
                    </h1>

                    <?php


                    $dbuser = 'project';
                    $dbpass = 'tiger';
                    $connection_string = 'localhost/xe';

                    //Connect to an Oracle database
                    $conn = oci_connect($dbuser, $dbpass, $connection_string);


                    $query = "select c.*, u.* from complain c ,users u where c.USERS_ID=u.USERS_ID ";
                    $statement = oci_parse($conn, $query);
                    oci_execute($statement);
                    // $row = oci_fetch_assoc($userQuery);
                    // if (oci_num_rows($userQuery) > 0) {
                    echo "<table><tr><th>COMPLAIN_ID</th><th>COMPLAIN_DESCRIPTION</th><th>STATUS</th><th>USER NAME</th><th>COMPLAIN_TOPIC</th><th>Action</th></tr>";
                    // output data of each row
                    // print_r($row);
                    while ($row = oci_fetch_array($statement, OCI_RETURN_NULLS + OCI_ASSOC)) {
                        echo "<tr><td>" . $row["COMPLAIN_ID"] . "</td><td>" . $row["COMPLAIN_DESCRIPTION"] . "</td><td>" . $row["STATUS"] . "</td><td>" . $row["USERS_NAME"] . "</td><td>" . $row["COMPLAIN_TOPIC"] .
                            "</td><td>" . '<a class="btn btn-sm btn-primary m-1 pr-5" href="complainAction.php?COMPLAIN_ID=' . $row["COMPLAIN_ID"] . '">View</a>' . "</td></tr>";
                    }
                    echo "</table>";


                    ?>

                </div>
            </section>


    </table>
    </div>
</body>

</html>