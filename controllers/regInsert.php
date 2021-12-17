<?php

$dbuser = 'project';
$dbpass = 'tiger';
$connection_string = 'localhost/xe';
$db = oci_connect($dbuser, $dbpass, $connection_string);

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];


    //$sql="insert into users(USERNAME, EMAIL, PASSWORD   , MOBILE, FIRST_NAME, LAST_NAME , U_CREATED_AT, U_MODIFIED_AT) VALUES('${username}','${email}','${password}','${mobile}','${fname}','${lname}','${createdat}','${updatedat}')";

    $sql = "insert into users VALUES (user_U_ID_seq.NEXTVAL,'" . $username . "','" . $email . "','" . $password . "','" . $mobile . "','" . $fname . "','" . $lname . "')";

    /*$status=oci_parse($db,$sql);
        $res=oci_execute($status);

        if($status){
        ?>
            <script type="text/javascript">
                alert('Inserted data in database');
            </script>
        <?php
                header('location: index.html');          
            }else{
        ?>
            <script type="text/javascript">
                alert('Missing Data Input...!');
            </script>
        <?php
            }
        //}
    }
?>*/

    $st = oci_parse($db, $sql);
    $r = oci_execute($st);
    if ($r) {
        echo ' data is inserted...<br>';
        header("location: ../index.html");
    } else {
        echo 'data was not inserted...<br>';
    }
}
