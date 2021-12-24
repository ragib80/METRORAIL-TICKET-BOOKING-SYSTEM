<?php
require_once('adminTopNav.php');
?>
<section>
    <div class="container mt-5">
        <h1>
            Purchased Tickets History
        </h1>

        <?php
        $dbuser = 'project';
        $dbpass = 'tiger';
        $connection_string = 'localhost/xe';

        //Connect to an Oracle database
        $conn = oci_connect($dbuser, $dbpass, $connection_string);
        $query = "select * from payment";
        $userQuery = oci_parse($conn, $query);
        oci_execute($userQuery);


        // $row = oci_fetch_assoc($userQuery);
        // if (oci_num_rows($userQuery) > 0) {
        echo "<table><tr><th>PAYMENT_ID</th><th>PAYMENT_DESCRIPTION</th><th>PAYMENT_AMOUNT</th><th>USERS_ID</th></tr>";
        // output data of each row
        // print_r($row);
        while ($row = oci_fetch_array($userQuery, OCI_RETURN_NULLS + OCI_ASSOC)) {
            echo "<tr><td>" . $row["PAYMENT_ID"] . "</td><td>" . $row["PAYMENT_DESCRIPTION"] . "</td><td>" . $row["PAYMENT_AMOUNT"] .
                "</td><td>" . $row["USERS_ID"] . "</td></tr>";
        }
        echo "</table>";


        ?>

    </div>
</section>