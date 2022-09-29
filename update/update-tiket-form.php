<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>update ticket</title>
    <style>
        label {
            font-size: 20px;
            color: black;
            font-weight: bold;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .alert-success {
            color: black;
        }
    </style>
</head>

<?php include("..//connection.php") ?>

<body style="background-color: secondary;">
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

            <div class="col-lg-6 bg-secondary rounded" id="body">
                <?php
                $info = "";
                $id_number = $_GET['id_number'];

                $result_journy = $conn->query("SELECT * FROM `reserved_journey` where `id`='$id_number'");

                if ($result_journy->num_rows > 0) {
                    while ($row = $result_journy->fetch_assoc()) {
                        $id =  $row['id'];
                        $buss_id =  $row['buss_id'];
                        $full_name =  $row['full-name'];
                        $journey_date =  $row['journey_date'];
                        $tickt_no =  $row['tickt_no'];
                    }
                }

                $time = date("h:i:sa");

                if (isset($_POST['register'])) {

                    $date = $_POST['date'];
                    if ($date <= date("Y-m-d")) {
                        print " <hr> <div class='alert alert-danger'>
                        <strong>" . htmlspecialchars($lang['w']) . "</strong> " . htmlspecialchars($lang['invalid_date']) . "!!
                    </div>";
                    } else {
                            if (
                                $conn->query("UPDATE `reserved_journey` SET `journey_date`='$date' WHERE`id`='$id_number'") &&
                                $conn->query("INSERT INTO `tickt_update`(`full-name`,`tickt_no`,`old_date`,`new_date`,`time`) VALUES ('$full_name','$tickt_no','$journey_date','$date','$time')")
                            ) {
                                $info =
                                "<div class='alert alert-success'>
                            <strong>".htmlspecialchars($lang['s']) ."</strong> Your are successful upatedd. 
                             </div>";
                        } else {
                            $info = "<div class='alert alert-danger'>
                                    <strong>".htmlspecialchars($lang['w']) ."</strong>!!
                                " . $conn->error . "</div>";
                        }
                    }
                }
                ?>
                <hr>

                <h3 class="rounded">
                    <?php echo htmlspecialchars($lang['update-tiket']); ?>
                </h3>
                <div id="inform">
                    <i><?php print $info ?></i>
                </div>
                <hr>

                <div id="re_form">
                    <form method="POST" class="row g-3">

                        <div class="form-group">
                            <label for="source"><?php echo htmlspecialchars($lang['full-name']); ?></label>
                            <div class="alert-success rounded" style="padding-left: 15px;">
                                <?php print $full_name; ?>
                            </div>
                            <label for="source"><?php echo htmlspecialchars($lang['o-date']); ?></label>
                            <div class="alert-success rounded" style="padding-left: 15px;">
                                <?php print $journey_date; ?>
                            </div>

                            <label for="desti"><?php echo htmlspecialchars($lang['n-date']); ?>:</label>
                            <div class="alert-success rounded" style="padding-left: 15px;">
                                <input class="form-control" type="date" name="date" id="date" required>
                            </div>
                        </div>

                        <div class="col-6 text-center">
                            <button type="submit" name="register" class="btn btn-primary"><?php echo htmlspecialchars($lang['save']); ?></button>
                        </div>
                        <div class="col-6 text-center">
                            <button type="clear" class="btn btn-danger"><?php echo htmlspecialchars($lang['reset']); ?></button>
                        </div>
                        <hr>
                    </form>
                </div>

                <hr>

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