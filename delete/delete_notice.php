<?php

include("..//connection.php");

$sql2 = "DELETE FROM `notice` WHERE id = '$_GET[c_id]'";

$result = $conn->query($sql2);
if ($result) {
    header("Location:http://localhost/TMS/view/notice.php?");
} else {
    print "Error " . $conn->error;
}
