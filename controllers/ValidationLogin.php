<?php
session_start();
include('../models/db.php');


$error = "";
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["pass"];
    // $type = $_REQUEST["type"];
    if (empty($email) || empty($pass)) {
        $error = "All fields are required";
    } else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {

        $error = "Email address must contain @";
    } else if (!preg_match("/[0-9]/", $pass) || ((strlen($pass)) < 6)) {
        $error = "Password Should be numeric and 6 words";
    } else {


        $connection = new db();
        $conobj = $connection->OpenCon();
        $userQuery = $connection->ValidateLogin($conobj, "admin", $email, $pass);
        $data = oci_execute($userQuery);
        if ($data) {
            $row = oci_fetch_assoc($userQuery);
            //$_SESSION['username'] = $user;
            $_SESSION['username'] = $row['ADMIN_EMAIL'];
            $_SESSION['userid'] = $row['ADMIN_ID'];
            // $_SESSION['id'] = $id;
            $_SESSION['time_start_login'] = time();
            header("location: ../views/UserHome.php");
            //header("location: dashboard.php");
        } else {

            echo "wrong password or username";
        }



        $connection->CloseCon($conobj);
    }
}