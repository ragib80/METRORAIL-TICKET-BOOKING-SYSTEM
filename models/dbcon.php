<?php

function getConnection()
{

    $dbuser = 'project';
    $dbpass = 'tiger';
    $connection_string = 'localhost/xe';

    //Connect to an Oracle database
    $conn = oci_connect($dbuser, $dbpass, $connection_string);


    if (!$conn) {

        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    return $conn;
}
