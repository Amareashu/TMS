<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>reserv tiket</title>
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
                    <h3 class="text-center rounded"><?php echo htmlspecialchars($lang['my_reserve']); ?></h3>
                    <hr>
                    <?php
                    $amount = 0;
                    $t=0;
                    $tickt_no = $seat_no = $status = "";
                    $pass_id = $_SESSION['user_id'];
                    $result = $conn->query("SELECT * FROM `reserved_journey` WHERE `pass_id`='$pass_id'");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            $buss_id = $row["buss_id"];
                            $full_name = $row["full-name"];
                            $phone = $row["phone"];
                            $journey_date = $row["journey_date"];
                            $amount = $amount + intval($row["amount"]);
                            $one_tiket = $row["amount"];
                            $tickt_no = $tickt_no . $row["tickt_no"] . ", ";
                            $seat_no = $seat_no . $row["seat_no"] . ", ";
                            $status = $status .  $row["status"] . ", ";
                            $t++;
                        }
                    }
                    ?>
                    <div class='alert alert-success rounded row' style="margin-right: 1%; margin-left: 1%;">
                        <hr>
                        <div class="col-md-6">
                            <strong><?php echo htmlspecialchars($lang['b/no']); ?> </strong><?php print $buss_id ?>
                            <hr>
                            <strong><?php echo htmlspecialchars($lang['full-name']); ?></strong> <?php print $full_name ?>
                            <hr>
                            <strong><?php echo htmlspecialchars($lang['phone']); ?></strong> <?php print $phone ?>
                            <hr>
                            <strong><?php echo htmlspecialchars($lang['date']); ?></strong> <?php print $journey_date ?>
                            <hr>
                        </div>

                        <div class="col-md-6">
                            <strong><?php echo htmlspecialchars($lang['tickt_no']); ?></strong> <?php print $tickt_no ?>
                            <hr>
                            <strong><?php echo htmlspecialchars($lang['payment']); ?></strong> <?php print $one_tiket."X".$t." = ".$amount?>
                            <hr>
                            <strong><?php echo htmlspecialchars($lang['p/seat']); ?></strong> <?php print $seat_no ?>
                            <hr>
                            <strong><?php echo htmlspecialchars($lang['status']); ?></strong> <?php print $status ?>
                            <hr>
                        </div>
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