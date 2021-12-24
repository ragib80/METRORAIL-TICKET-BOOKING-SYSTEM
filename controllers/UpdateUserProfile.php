<?php

include('../models/db.php');


$error = "";

if (isset($_POST['update'])) {

    if (empty($_POST['name'] || $_POST['pass']  || $_POST['email'])) {


        echo  "input given is invalid";
    } else {
        $connection = new db();
        $conobj = $connection->OpenCon();
        $userQuery = $connection->UpdateUserProfile($conobj, "users", $_POST['name'], $_SESSION['userid'], $_POST['pass']);
        $r = oci_execute($userQuery);
        print_r($r);
        if ($r) {
            $error = "update successful";
        } else {
            $error = "could not update";
        }
        $connection->CloseCon($conobj);
    }
}