<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>Assign buss</title>
    <style>
        label {
            font-size: 20px;
        }
    </style>
</head>

<body style="background-color: gray;">
    <?php
    include("..//menu.php");
    include("..//connection.php");
    ?>
    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            include("..//r_side_menu.php");
            ?>

            <div class="div2 row col-lg-6 rounded  rounded bg-secondary" id="body">
                <form method="post" action="" style="font-family: 'Times New Roman', Times, serif;">
                    <hr>

                    <?php
                    $info = "";
                    if (isset($_POST['register'])) {
                        $plate_no = $_POST['plate_no'];
                        $source = $_POST['source'];
                        $desti = $_POST['desti'];
                        $j_date = $_POST['j_date'];

                        $date_2 = date("Y-m-d");
                        if ($date_2 > $j_date) {
                            print "<div class='alert alert-danger'>
                        <strong>" . htmlspecialchars($lang['w']) . "</strong> " . htmlspecialchars($lang['invalid_date']) . "!!
                    </div>";
                        } else {

                            $result = $conn->query("SELECT * FROM `journy-list` WHERE `sourse`='$source' and `desti`='$desti'");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $payment = $row['payment'];
                                    $update_query = "UPDATE `buss` SET `status`='reserved'WHERE`plate_no`='$plate_no'";

                                    $reserved_query = "INSERT INTO `assign_buss`(`buss_id`, `source`, `destination`, `payment_amount`, `j_date`) VALUES 
                                 ('$plate_no','$source','$desti','$payment','$j_date' )";

                                    if ($conn->query($reserved_query) && $conn->query($update_query)) {
                                        $info =
                                            "<div class='alert alert-success'>
                                           <strong>Success!</strong> Your are successful reserved. 
                                        </div>";
                                    } else {
                                        $info =
                                            "<div class='alert alert-success'>
                                           <strong>Error!</strong> " . $conn->error . "
                                        </div>";
                                    }
                                }
                            }
                        }
                    }
                    ?>

                    <h3><?php echo htmlspecialchars($lang['assign-buss']); ?></h3>
                    <hr>
                    <?php print $info; ?>
                    <div class="form-group">
                        <label for="source"><?php echo htmlspecialchars($lang['b/no']); ?></label>
                        <select class="form-control" id="plate_no" name="plate_no" required>
                            <option></option>
                            <?php
                            $result_buss = $conn->query(" SELECT * FROM `buss` WHERE `status`='Active'");
                            if ($result_buss->num_rows > 0) {
                                while ($row_b = $result_buss->fetch_assoc()) {
                                    print "<option>" . $row_b['plate_no'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <hr>
                        <label for="source"><?php echo htmlspecialchars($lang['sourse']); ?></label>
                        <select class="form-control" id="source" name="source" required>
                            <option></option>
                            <?php
                            $result_journy = $conn->query("SELECT DISTINCT sourse  FROM `journy-list`");
                            if ($result_journy->num_rows > 0) {
                                while ($row = $result_journy->fetch_assoc()) {
                                    print "<option>" . $row['sourse'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <hr>
                        <label for="desti"><?php echo htmlspecialchars($lang['desti']); ?>:</label>
                        <select class="form-control" id="desti" name="desti" required>
                            <option></option>
                            <?php
                            $result_journy = $conn->query("SELECT DISTINCT desti  FROM `journy-list`");
                            if ($result_journy->num_rows > 0) {
                                while ($row = $result_journy->fetch_assoc()) {
                                    print "<option>" . $row['desti'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <hr>
                        <label for="desti"><?php echo htmlspecialchars($lang['date']); ?>:</label>
                        <input name="j_date" class="form-control" type="date">
                    </div>
                    <br>
                    <div class="text-left">
                        <button type="submit" name="register" class="btn btn-primary"><?php echo htmlspecialchars($lang['next']); ?></button>
                    </div>
                    <hr>
                </form>
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