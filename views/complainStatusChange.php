<?php
require_once('adminTopNav.php');
?>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>
    <?php

    include('../models/db.php');

    // if (!isset($_SESSION['email'])) {
    //     die('Not logged in');
    // }


    // // Guardian: Make sure that complain_id is present
    // if (!isset($_GET['complain_id'])) {
    //     $_SESSION['error'] = "Missing complain id";
    //     header('Location: AdminHome.php');
    //     return;
    // }


    $complain_id = $_GET['COMPLAIN_ID'];
    $connection = new db();
    $conobj = $connection->OpenCon();


    $userQuery = $connection->ShowComplainId($conobj, "complain", $complain_id);
    oci_execute($userQuery);



    while ($row = oci_fetch_assoc($userQuery)) {


    ?>

        <form method="POST" action="../controllers/saveStatus.php">
            <div class="form-group">

                <label for="formGroupExampleInput">COMPLAIN Topic</label>
                <input type="hidden" name="COMPLAIN_ID" value="<?php echo $row['COMPLAIN_ID']; ?>" />
                <input type="text" class="form-control" id="COMPLAIN_TOPIC" name="COMPLAIN_TOPIC" value="<?php echo $row['COMPLAIN_TOPIC']; ?>">
            </div>
            <div class="form-group">

                <label for="formGroupExampleInput">COMPLAIN_DESCRIPTION</label>

                <input type="text" class="form-control" id="COMPLAIN_DESCRIPTION" name="COMPLAIN_DESCRIPTION" value="<?php echo $row['COMPLAIN_DESCRIPTION']; ?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">User Id</label>
                <input type="text" class="form-control" id="USERS_ID" name="USERS_ID" value="<?php echo $row['USERS_ID']; ?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Status</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="Status" value="<?php echo $row['STATUS']; ?>">
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="submit">
        </form>




    <?php } ?>
</div>