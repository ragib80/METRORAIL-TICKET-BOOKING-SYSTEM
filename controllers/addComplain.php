<?php
require_once('../models/db.php');



$connection = new db();
if (isset($_POST['submit'])) {
    session_start();
    $complain = $_POST['complainDetails'];
    $type = $_POST['type'];
    $userid = $_SESSION['userid'];

    $conobj = $connection->OpenCon();
    $userQuery = $connection->InsertComplain($conobj, "complain", $complain, $type, $status, $userid);
    oci_execute($userQuery);
    // $row = oci_fetch_assoc($userQuery);
    // print_r($row);
    // if ($row) {
    //     $_SESSION["username"] = $row['ADMIN_EMAIL'];
    //     $_SESSION["userid"] = $row['ADMIN_ID'];

    //     // $_SESSION["email"] = $row['EMAIL'];
    //     // $_SESSION["pass"] = $row['PASSWORD'];
    //     header("location: ../views/UserHome.php");
    //     $_SESSION['success'] = "Login Successful";
    // } else {
    //     $error = "Username or Password is invalid";
    // }


    header("../views/PreviousComplain.php");
}
$connection->CloseCon($conobj);
