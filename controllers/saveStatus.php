<?php

$dbuser = 'project';
$dbpass = 'tiger';
$connection_string = 'localhost/xe';
$db = oci_connect($dbuser, $dbpass, $connection_string);

//$complain_id = $_GET['COMPLAIN_ID'];
if (isset($_POST['submit'])) {
    $COMPLAIN_ID = $_REQUEST['COMPLAIN_ID'];
    $status = $_POST['Status'];



    //$sql="insert into users(USERNAME, EMAIL, PASSWORD   , MOBILE, FIRST_NAME, LAST_NAME , U_CREATED_AT, U_MODIFIED_AT) VALUES('${username}','${email}','${password}','${mobile}','${fname}','${lname}','${createdat}','${updatedat}')";

    //$sql =  "UPDATE complain SET STATUS=" . $status . " WHERE COMPLAIN_ID= " . $COMPLAIN_ID . " ";
    $sql =  "UPDATE complain SET STATUS='solved' WHERE COMPLAIN_ID= " . $COMPLAIN_ID . " ";

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
        header("location: ../views/complaindetails.php");
    } else {
        echo 'data was not inserted...<br>';
    }
}
