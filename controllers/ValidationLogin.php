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
        oci_execute($userQuery);
        $row = oci_fetch_assoc($userQuery);
        // print_r($row);
        if ($row) {
            $_SESSION["username"] = $row['ADMIN_EMAIL'];
            $_SESSION["userid"] = $row['ADMIN_ID'];

            // $_SESSION["email"] = $row['EMAIL'];
            // $_SESSION["pass"] = $row['PASSWORD'];
            header("location: ../views/UserHome.php");
            $_SESSION['success'] = "Login Successful";
        } else {
            $error = "Username or Password is invalid";
        }



        $connection->CloseCon($conobj);
    }
}