<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB</title>
</head>


<body>
    <?php
    $GLOBALS['error'] = "";
    $GLOBALS['success'] = "";
    class db
    {
        function OpenCon()
        {
            $dbhost = "localhost/xe";
            $dbuser = "project";
            $dbpass = "tiger";
            // $db = "ridehub";

            $this->conn = @oci_connect($dbuser, $dbpass, $dbhost);
            return $this->conn;
        }
        function CheckUser($conn, $table, $email, $password)
        {
            $error = "";
            $result = $conn->query("SELECT * FROM " . $table . " WHERE email='" . $email . "' AND password='" . $password . "'");
            return $result;
        }

        function InsertCustomer($conn, $table, $name, $email, $password, $type, $phone, $birthdate, $address)
        {
            $error = "";
            $result = "INSERT INTO " . $table . " (name,email,password,type,phone,birthday,address)
VALUES('$name','$email','$password','$type','$phone','$birthdate','$address')";
            if ($conn->query($result) === TRUE) {
                $success = "New record created successfully";
                return $result . $success;
            } else {
                $error = "Error: " . $result . "<br>" . $conn->error;
            }
        }

        function InsertVendor($conn, $table, $name, $email, $password, $type, $phone, $address, $tradelicense)
        {
            $error = "";
            $result = "INSERT INTO " . $table . " (name, email,password,type,phone,address,tradelicense)
VALUES('$name', '$email','$password','$type','$phone','$address','$tradelicense')";
            if ($conn->query($result) === TRUE) {
                $success =  "New record created successfully";
                return $result . $success;
            } else {
                $error = "Error: " . $result . "<br>" . $conn->error;
            }
        }
        function InsertDriver($conn, $table, $name, $email, $password, $type, $phone, $birthday, $address, $drivinglicense)
        {
            $error = "";
            $result = "INSERT INTO " . $table . " (name,email,password,type,phone,birthday,address,drivinglicense)
VALUES('$name','$email','$password','$type','$phone','$birthday','$address','$drivinglicense')";
            if ($conn->query($result) === TRUE) {
                $success = "New record created successfully";
                return $result . $success;
            } else {
                $error = "Error: " . $result . "<br>" . $conn->error;
            }
        }

        function InsertLogin($conn, $table, $name, $email, $password, $type)
        {
            $error = "";
            $result = "INSERT INTO " . $table . " (name,email,password,type)
VALUES('$name','$email','$password','$type')";
            if ($conn->query($result) === TRUE) {
                $success = "Data inserted into login table successfully";
                header('Location:login.php');
                return $result . $success;
            } else {
                $error = "Error: " . $result . "<br>" . $conn->error;
            }
        }

        function InsertComplain($conn, $table, $complain, $type, $users_id, $status)
        {
            $data = oci_parse($conn, "insert into $table VALUES (complain_complain_id_seq.NEXTVAL,'" . $complain . "','" . $type . "','" . $users_id . "','" . $status . "')");
            return $data;
        }
        function InsertPaymentRequest($conn, $table, $PAYMENT_ID, $PAYMENT_DESCRIPTION, $PAYMENT_AMOUNT, $USERS_ID)
        {
            $result = oci_parse(
                $conn,
                "INSERT INTO payment(payment_id , payment_description, payment_amount,users_id)
VALUES(payment_payment_id_seq.NEXTVAL,'$PAYMENT_DESCRIPTION',$PAYMENT_AMOUNT,$USERS_ID)"
            );
            return $result;
        }

        function ValidateLogin($conn, $table, $email, $password)
        {

            $data = oci_parse($conn, "select * from $table where USERS_EMAIL='$email' and USERS_PASSWORD='$password'");
            return $data;
        }



        function UpdateVendor($conn, $table, $name, $email, $pass, $address, $phone)

        {
            $result = "UPDATE $table SET name='$name', email='$email',password='$pass', address='$address' , phone='$phone' WHERE email='$email'";
            $error = "";
            if ($conn->query($result) === TRUE) {
                return $result . $error;
            } else {
                $error = "Error: " . $result . "<br>" . $conn->error;
            }
        }
        function UpdateCustomer($conn, $table, $name, $email, $pass, $address, $phone)

        {
            $result = "UPDATE $table SET name='$name', email='$email',password='$pass', address='$address' , phone='$phone' WHERE email='$email'";
            $error = "";
            if ($conn->query($result) === TRUE) {
                return $result . $error;
            } else {
                $error = "Error: " . $result . "<br>" . $conn->error;
            }
        }
        function UpdateCustomerAll($conn, $table, $name, $customer_id, $pass, $address, $phone)

        {

            $result = "UPDATE $table SET name='$name',password='$pass', address='$address' , phone='$phone' WHERE customer_id='$customer_id'";
            $error = "";
            if ($conn->query($result) === TRUE) {
                return $result . $error;
            } else {
                $error = "Error: " . $result . "<br>" . $conn->error;
            }
        }
        function UpdateCarAll($conn, $table, $car_id, $carname, $carm, $scount, $availability, $fare)

        {
            $result = "UPDATE $table SET carname='$carname',carmodel='$carm', sitcount='$scount' , availability='$availability', fareperh= '$fare' WHERE car_id='$car_id'";
            $error = "";
            if ($conn->query($result) === TRUE) {
                return $result . $error;
            } else {
                $error = "Error: " . $result . "<br>" . $conn->error;
            }
        }
        function UpdateVendorAll($conn, $table, $name, $vendor_id, $pass, $address, $phone)

        {
            $result = "UPDATE $table SET name='$name',password='$pass', address='$address' , phone='$phone' WHERE vendor_id='$vendor_id'";
            $error = "";
            if ($conn->query($result) === TRUE) {
                return $result . $error;
            } else {
                $error = "Error: " . $result . "<br>" . $conn->error;
            }
        }

        function UpdateDriver($conn, $table, $name, $email, $pass, $phone, $address)

        {
            $result = "UPDATE $table SET name='$name', email='$email',password='$pass',  phone='$phone' , address='$address'  WHERE email='$email'";
            $error = "";
            if ($conn->query($result) === TRUE) {
                return $result . $error;
            } else {
                $error = "Error: " . $result . "<br>" . $conn->error;
            }
        }
        function ShowLocation($conn, $table, $trainNo)
        {
            $result = oci_parse($conn, "SELECT * FROM $table where train_no='$trainNo'");
            return $result;
        }
        function ShowAllByCustomerID($conn, $table, $customer_id)
        {
            $result = $conn->query("SELECT * FROM $table WHERE customer_id='$customer_id' ");
            return $result;
        }
        function ShowComplain($conn, $table, $users_id)
        {
            $result = oci_parse($conn, "SELECT * From $table where users_id='$users_id' order by complain_id desc");
            return $result;
        }
        function ShowPurchasedTicket($conn, $table, $users_id)
        {
            $result = oci_parse($conn, "SELECT * From $table where users_id='$users_id' order by payment_id desc");
            return $result;
        }
        function ShowComplainId($conn, $table, $complain_id)
        {
            $result = oci_parse($conn, "SELECT * From $table where complain_id='$complain_id'");
            return $result;
        }

        function ShowTicket($conn, $table, $from, $to, $date, $table1)
        {
            $result = oci_parse($conn, "SELECT t.*,d.destination_from,d.destination_to from $table t , $table1 d where 
           destination_from='$from' and destination_to='$to' and ticket_date='$date' and t.destination_id=d.destination_id");
            return $result;
        }
        function ShowRequestedTicket($conn, $table, $ticket_id, $table2)
        {
            $result = oci_parse($conn, "select t.*,p.payment_amount,p.payment_description,d.DESTINATION_FROM,d.DESTINATION_TO from ticket t,payment p,destination d where TICKET_ID= '$ticket_id' and t.PAYMENT_ID=p.PAYMENT_ID and t.DESTINATION_ID=d.DESTINATION_ID");
            return $result;
        }
        function ShowUserProfile($conn, $table, $id)
        {
            $result = oci_parse($conn, "SELECT * FROM $table  WHERE users_id= '$id'");
            return $result;
        }
        function GetCarByName($conn, $table, $name)
        {
            $result = $conn->query("SELECT * FROM $table  WHERE carname= '$name'");
            return $result;
        }
        function DeleteComplain($conn, $table, $complain_id)
        {
            $result = oci_parse($conn, "DELETE FROM $table WHERE complain_id = '$complain_id'");
            return $result;
        }
        function DeleteVendor($conn, $table, $vendor_id)
        {
            $result = $conn->query("DELETE FROM $table WHERE vendor_id = '$vendor_id'");
            return $result;
        }
        function DeleteDriver($conn, $table, $driver_id)
        {
            $result = $conn->query("DELETE FROM $table WHERE driver_id = '$driver_id'");
            return $result;
        }
        function DeleteCar($conn, $table, $car_id)
        {
            $result = $conn->query("DELETE FROM $table WHERE car_id = '$car_id'");
            return $result;
        }
        function DeleteFromLogin($conn, $table, $email)
        {
            $result = $conn->query("DELETE FROM $table WHERE email = '$email'");
            return $result;
        }
        function UpdateCarRequest($conn, $table, $req_id, $status_vendor)
        {

            $result = "UPDATE $table SET status_vendor='$status_vendor' WHERE req_id='$req_id'";
            $error = "";
            if ($conn->query($result) === TRUE) {
                return $result;
            } else {
                $error = "Error: " . $result . "<br>" . $conn->error;
            }
            return $result;
        }

        function CloseCon($conn)
        {
            oci_close($conn);
        }
    }

    ?>
</body>

</html>