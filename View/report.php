<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>Report</title>
    <style>
        label {
            font-size: 20px;
        }
    </style>
</head>

<?php include("..//connection.php") ?>

<body style="background-color: gray;">
    <?php
    include("..//menu.php");
    ?>
    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            include("..//r_side_menu.php");
            $li = 1;
            ?>

            <div class="div2 row col-lg-6 rounded  rounded bg-secondary" id="body" style="font-family: 'Times New Roman', Times, serif;">
                <div class="form-group">
                    <hr>
                    <h3 class="text-center rounded"><?php echo htmlspecialchars($lang['genrate-repo']); ?></h3>
                    <hr>
                    <?php

                    $result_pass = $conn->query("SELECT * FROM `reserved_journey`");
                    $passenger = $result_pass->num_rows;

                    $result_buss = $conn->query("SELECT * FROM `buss`");
                    $buss = $result_buss->num_rows;

                    $a_result_pass = $conn->query("SELECT * FROM `reserved_journey` WHERE `status`='Confirm'");
                    $a_passenger = $a_result_pass->num_rows;

                    $p_result_pass = $conn->query("SELECT * FROM `reserved_journey` WHERE `status`='unconfirmed'");
                    $p_passenger = $p_result_pass->num_rows;

                    $c_result_pass = $conn->query("SELECT * FROM `reserved_journey` WHERE `status`='Cancel'");
                    $c_passenger = $c_result_pass->num_rows;

                    $u_cancel_result_pass = $conn->query("SELECT * FROM `reserved_journey` WHERE `status`='u_cancel'");
                    $u_cancel_passenger = $u_cancel_result_pass->num_rows;

                    ?>

                    <div class='alert alert-success'>

                        <strong><?php echo htmlspecialchars($lang['total_b']); ?> </strong> <?php print $buss ?>
                        <hr>
                        <strong><?php echo htmlspecialchars($lang['total_j']); ?> </strong> <?php print $passenger ?>
                        <hr>
                        <strong><?php echo htmlspecialchars($lang['u_cancel']); ?> </strong> <?php print $u_cancel_passenger ?>
                        <hr>
                        <strong><?php echo htmlspecialchars($lang['app_j']); ?> </strong> <?php print $a_passenger ?>
                        <hr>
                        <strong><?php echo htmlspecialchars($lang['pnd_j']); ?> </strong> <?php print $p_passenger ?>
                        <hr>
                        <strong><?php echo htmlspecialchars($lang['can_j']); ?> </strong> <?php print $c_passenger ?>
                        <hr>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 rounded  rounded bg-secondary">
                <?php
                include '../timecalendar.php';
                ?>
            </div>

        </div>
    </div>
    <?php include("..//footer.php") ?>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
</body>

</html>