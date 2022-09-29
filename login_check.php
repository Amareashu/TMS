<?php
if(!isset($_SESSION['role'])){
    $_SESSION['no_login_message']=
    "<i style='color: red;
    font-family: 'times new roman';
    font-weight: bold;'>
    Please login Firste to access this page</i>";
    header("Location:http://localhost/TMS/log/login.php");
}