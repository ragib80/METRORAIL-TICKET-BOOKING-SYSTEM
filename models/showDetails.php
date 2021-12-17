<?php
require_once('dbcon.php');

function showComplainDetails()
{


    $conn = getConnection();
    $query = "select * from complain";
    $statement = oci_parse($conn, $query);
    oci_execute($statement);

    return $statement;
}
