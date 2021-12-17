<?php
require_once('../models/dbcon.php');
$db = getConnection();

if (isset($_POST['submit'])) {

    $complain = $_POST['complainDetails'];
    $type = $_POST['type'];


    $sql = "insert into complain VALUES (complain_complain_id_seq.NEXTVAL,'" . $complain . "','" . $type . "')";



    $st = oci_parse($db, $sql);
    $r = oci_execute($st);
    if ($r) {
        echo ' data is inserted...<br>';
        header("location: ../views/userDashboard.php");
    } else {
        echo 'data was not inserted...<br>';
    }
}
