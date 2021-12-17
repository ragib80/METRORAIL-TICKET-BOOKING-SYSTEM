<?php
require_once('adminTopNav.php');
?>
<table class="table table-bordered">
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">

        </div>



        <tbody>

            <?php
            $dbuser = 'project';
            $dbpass = 'tiger';
            $connection_string = 'localhost/xe';

            //Connect to an Oracle database
            $conn = oci_connect($dbuser, $dbpass, $connection_string);


            $query = "select * from complain";
            $statement = oci_parse($conn, $query);
            $r = oci_execute($statement);
            ///require_once('../models/showDetails.php');
            //$statement = showComplainDetails();

            /* require_once('../models/showDetails.php');
            $statement = showComplainDetails();

            while (($row = oci_fetch_array($statement, OCI_ASSOC)) != false) {


                echo "<tr>
          <td>{$row['complain_id']}</td>
          <td>{$row['complain_topic']}</td>
          <td>{$row['complain_description']}</td>
         
      </tr>";
            }*/
            /* while ($row = oci_fetch_array($statement, OCI_ASSOC + OCI_RETURN_NULLS)) {
            ?>
                <tr>
                    <td><?php echo $row['complain_id']; ?></td>
                    <td><?php echo $row['complain_topic']; ?></td>
                    <td><?php echo $row['complain_description']; ?></td>



                </tr>
            <?php }*/
            print '<table border="1">  <tr>
            <th scope="col">Id</th>
            <th scope="col">Complain Topic</th>
            <th scope="col" colspan="2">Complain Details</th>

        </tr>';
            while ($row = oci_fetch_array($statement, OCI_RETURN_NULLS + OCI_ASSOC)) {

                foreach ($row as $item) {
                    print '<td>' . ($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp') . '</td>';
                }
                print '</tr>';
            }
            print '</table>';
            ?>
        </tbody>
</table>
</div>