<?php
include("../connection.php");

$id= $_GET["r_no"];

$update_query= "UPDATE `reserved_journey` SET `status`='Cancelled' WHERE`id`='$id'";

if ($conn->query($update_query)){
    header("Location:http://localhost/TMS/Ticket-officer/cancel-re.php");
}