<?php
/* Set oracle user login and password info */

$dbuser = 'project';
$dbpass = 'tiger';
$connection_string = 'localhost/xe';
$db = oci_connect($dbuser, $dbpass, $connection_string);

if (isset($_POST['submit'])) {
    session_start();
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $s = oci_parse($db, "select * from users where username='$user' and password='$pass'");
    //oci_execute($s);
    //$row = oci_fetch_all($s, $res);



    /*if ($row) {
        //$_SESSION['username'] = $user;
        $_SESSION['username'] = $row['USERNAME'];
        // $_SESSION['id'] = $id;
        $_SESSION['time_start_login'] = time();
        header("location: ../views/userDashboard.php");
        //header("location: dashboard.php");
    } else {

        echo "wrong password or username";
    }
}*/

    $data = oci_execute($s);
    if ($data) {
        $row = oci_fetch_assoc($s);
        //$_SESSION['username'] = $user;
        $_SESSION['username'] = $row['USERNAME'];
        $_SESSION['userid'] = $row['U_ID'];
        // $_SESSION['id'] = $id;
        $_SESSION['time_start_login'] = time();
        header("location: ../views/userDashboard.php");
        //header("location: dashboard.php");
    } else {

        echo "wrong password or username";
    }
}



   


/*if(isset($_POST['submit'])){
               

                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $query = oci_parse($db, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
                    oci_execute($query);

                    //$rs = $db->query($query);
                    //$num = $rs->num_rows;
                    $rows = oci_fetch_array();
                    if( $rows ){
                        
                        $_SESSION['username'] = $rows['username'];
                        $_SESSION['password'] = $rows['password'];
                        echo "login sucessful";
                        header('location:dashBoard.php');
                      
                    } 
                    else{
                        echo "Login Failed. Try Again" ;
                                    
                    }
                }*/
