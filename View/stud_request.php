<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>Student Feedback</title>
    <style>
        table {

            font-size: 140%;
            font-family: 'Times New Roman';
            margin-left: 5%;
            margin-right: 5%;
        }

        tr td {
            width: 7%;
            padding: 0.5%;
        }

        #active {
            font-weight: bold;
        }
    </style>
</head>

<?php include("..//connection.php") ?>

<body style="background-color: gray;">
    <?php
    include("..//menu.php");
    include("../connection.php");
    include("..//login_check.php");
    ?>
    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            include("..//r_side_menu.php");
            $name = "";
            $user_id = $_SESSION['user_id'];
            $info = "";
            ?>

            <div class="col-lg-9 bg-secondary rounded">
                <hr>
                <h3 class="rounded" style="
                    background-color: rgb(56, 52, 52); 
                    text-align: center; 
                    color: wheat;
                    font-family: 'Times New Roman';">
                    <?php print "Student Feedback"; ?> </h3>
                <hr>
                <div class="col-lg-11">

                    <table class="table">
                        <?php
                        print $info;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        $num_per_page = 1;
                        $start_from = ($page - 1);

                        $sql = "SELECT * FROM `stud_feedback` WHERE `receiver`= '$user_id' limit $start_from,$num_per_page";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td>Sender Address :</td>
                                    <td> <?php print "<i> " . $row['stud_id'] . "</i>" ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Message :</td>
                                    <td> <?php print "<i> " . $row['message'] . "</i>" ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Date of Sending :</td>
                                    <td> <?php print "<i> " . $row['date'] . "</i>" ?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input name="stud_id" type="text" value="<?php print $row['stud_id'] ?>" hidden>
                                            <button name="replay" class="btn btn-info">replay</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>

                        <tr>
                            <td>
                                <?php

                                if (isset($_POST['replay'])) {
                                    $stud_id = $_POST['stud_id'];
                                ?>
                                    <form action="" method="POST">
                                        <div class="input-group mb-3">
                                            <input type="text" name="message" class="form-control" placeholder="Message">
                                            <div class="input-group-append">
                                                <button name="send" class="btn btn-success">send</button>
                                            </div>
                                        </div>
                                        <input name="stud_id" type="text" value="<?php print $stud_id ?>" hidden>
                                    </form>
                                <?php
                                }
                                if (isset($_POST['send'])) {
                                    $stud_id = $_POST['stud_id'];
                                    $message = $_POST['message'];
                                    $date = date("d-m-y");

                                    if ($conn->query("INSERT INTO `stud_response`(`stud_id`, `sender`, `message`, `date`) 
                                    VALUES ('$stud_id','$user_id','$message','$date')")) {
                                        $info = "<i style='color: green'>Your message is successfuly sent</i>";
                                    } else {
                                        print "some error occured " . $conn->error;
                                    }
                                }
                                ?>
                            </td>
                            <td colspan="2"> 
                                <hr>
                                <?php
                                $pr_query = "SELECT * FROM `stud_feedback` WHERE `receiver`= '$user_id'";
                                $pr_result = $conn->query($pr_query);

                                $total_record = $pr_result->num_rows;

                                $total_page = ceil($total_record / $num_per_page);
                                ?>
                                <div class="text-center col-md-12">
                                    <?php
                                    if ($page > 1) {
                                        echo "<a href='http://localhost/HSRS/View/stud_request.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
                                    }

                                    for ($i = 1; $i < $total_page; $i++) {
                                        echo "<a href='http://localhost/HSRS/View/stud_request.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
                                    }

                                    if ($i > $page) {
                                        echo "<a href='http://localhost/HSRS/View/stud_request.php?page=" . ($page + 1) . "' class='btn btn-danger'> Next</a>";
                                    }

                                    ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
    <?php include("..//footer.php"); ?>
</body>

</html>