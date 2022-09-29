<?php

include("..//connection.php");

if ('message' == $_GET['action']) {
    $sql2 = "DELETE FROM `message` WHERE id = '$_GET[c_id]'";
    $result = $conn->query($sql2);
    if ($result) {
        header("Location:http://localhost/TMS/view/staff_message.php?");
    } else {
        print "Error " . $conn->error;
    }
} else {
    $sql2 = "DELETE FROM `comment` WHERE id = '$_GET[c_id]'";
    $result = $conn->query($sql2);
    if ($result) {
        header("Location:http://localhost/TMS/view/message.php?");
    } else {
        print "Error " . $conn->error;
    }
}
