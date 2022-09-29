<?php
include("../connection.php");

$action= $_GET["action"];
$id= $_GET["id"];
$page= $_GET["page"];

print "page ".$page;
print "hd ".$action;
print "em ".$id;

if($action=='Active'){
    $update_query_account= "UPDATE `account` SET `status`='Deactive' WHERE`id`='$id'";
}else{
    $update_query_account= "UPDATE `account` SET `status`='Active' WHERE`id`='$id'";
}

if (($conn->query($update_query_account))){
    header("Location:http://localhost/TMS/update/update_account.php?page=$page");
}else{
    print $conn->error;
}