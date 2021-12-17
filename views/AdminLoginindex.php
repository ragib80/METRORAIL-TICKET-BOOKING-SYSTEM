<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V5</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../Asset/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Asset/vendor/adminLogin/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Asset/vendor/adminLogin/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Asset/vendor/adminLogin/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Asset/vendor/adminLogin/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Asset/vendor/adminLogin/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Asset/vendor/adminLogin/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Asset/css/utilAdmin.css">
    <link rel="stylesheet" type="text/css" href="../Asset/css/mainAdmin.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('../Asset/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form method="post" action="../controllers/adminLoginCon.php">
                    <span class="login100-form-title p-b-53">
                        Admin Login
                    </span>



                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Username
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Password
                        </span>

                        <a href="#" class="txt2 bo1 m-l-5">
                            Forgot?
                        </a>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-17">

                        <input class="login100-form-btn" type="submit" name="submit" value="submit">

                    </div>

                    <div class="w-full text-center p-t-55">
                        <span class="txt2">
                            want to go back?
                        </span>

                        <a href="../index.html" class="txt2 bo1">
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="../Asset/vendor/adminLogin/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../Asset/vendor/adminLogin/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../Asset/vendor/adminLogin/bootstrap/js/popper.js"></script>
    <!--===============================================================================================-->
    <script src="../Asset/vendor/adminLogin/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../Asset/vendor/adminLogin/daterangepicker/moment.min.js"></script>
    <script src="adminLogin/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../Asset/vendor/adminLogin/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="../Assetjs/mainAdmin.js"></script>

</body>

</html>