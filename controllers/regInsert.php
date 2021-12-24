<?php

$dbuser = 'project';
$dbpass = 'tiger';
$connection_string = 'localhost/xe';
$db = oci_connect($dbuser, $dbpass, $connection_string);

if (isset($_POST['submit'])) {

    $username = $_POST['USERS_NAME'];
    $fname = $_POST['FIRST_NAME'];
    $lname = $_POST['LAST_NAME'];
    $email = $_POST['USERS_EMAIL'];

    $password = $_POST['USERS_PASSWORD'];


    //$sql="insert into users(USERNAME, EMAIL, PASSWORD   , MOBILE, FIRST_NAME, LAST_NAME , U_CREATED_AT, U_MODIFIED_AT) VALUES('${username}','${email}','${password}','${mobile}','${fname}','${lname}','${createdat}','${updatedat}')";

    //working sql
    //$sql = "insert into users VALUES (users_users_id_seq.NEXTVAL,'" . $username . "','" . $email . "','" . $password . "','" . $fname . "','" . $lname . "')";

    //inser data using procedure
    $sql = "call user_registration('" . $username . "', '" . $email . "', '" . $password . "', '" . $fname . "', '" . $lname . "')";

    $st = oci_parse($db, $sql);
    $r = oci_execute($st);
    if ($r) {
        echo ' data is inserted...<br>';
        header("location: ../index.html");
    } else {
        echo 'data was not inserted...<br>';
    }
}
