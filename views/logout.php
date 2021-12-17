<?php
session_start();

echo "Logout Sucessful.<br> click here to <a class='btn btn-outline-success' href='../index.html'> Login again </a> ";
unset($_SESSION['username']);
unset($_SESSION['password']);
session_destroy();
?>
?>