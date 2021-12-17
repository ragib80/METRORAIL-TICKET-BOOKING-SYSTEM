<?php
require_once('../models/dbcon.php');
$db = getConnection();

if (isset($_POST['submit'])) {
    session_start();
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $s = oci_parse($db, "select ADMIN_NAME,ADMIN_PASSWORD from admin where ADMIN_NAME='$user' and ADMIN_PASSWORD='$pass'");
    oci_execute($s);
    $row = oci_fetch_all($s, $res);
    if ($row) {
        $_SESSION['username'] = $user;
        $_SESSION['time_start_login'] = time();
        header("location: ../views/adminDashboard.php");
        //header("location: dashboard.php");
    } else {

        echo "wrong password or username";
    }
}
