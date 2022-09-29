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
    $info = "";
    ?>
    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            include("..//r_side_menu.php")
            ?>

            <div class="div2 row col-lg-6 rounded  rounded bg-secondary" id="body">
                <form method="post" action="" style="font-family: 'Times New Roman', Times, serif;">
                    <hr>
                    <h3><?php echo htmlspecialchars($lang['passenger']); ?></h3>
                    <?php print $info; ?>
                    <hr>

                    <div class="form-group">
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
                        <br>
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
                        <br>
                        <label for="desti"><?php echo htmlspecialchars($lang['date']); ?>:</label>
                        <input class="form-control" type="date" name="date" id="date" required>
                    </div>

                    <br>
                    <div class="text-left">
                        <button type="submit" name="next" class="btn btn-primary"><?php echo htmlspecialchars($lang['next']); ?></button>
                    </div>
                    <hr>
                </form>

                <?php
                if (isset($_POST['next'])) {

                    $source = $_POST['source'];
                    $desti = $_POST['desti'];
                    $date = $_POST['date'];

                    $li = 1;

                ?>
                    <div class="input-group mb-3 table-responsive">
                        <table class="table table-bordered table-sm">

                            <tr style="font-size: 12px; color: black;">
                                <th colspan="2">#</th>
                                <th><?php echo htmlspecialchars($lang['b/no']); ?></th>
                                <th><?php echo htmlspecialchars($lang['level']); ?></th>
                                <th><?php echo htmlspecialchars($lang['payment']); ?></th>
                                <th><?php echo htmlspecialchars($lang['h/capacity']); ?></th>
                                <th><?php echo htmlspecialchars($lang['a/seat']); ?></th>
                                <th><?php echo htmlspecialchars($lang['action']); ?></th>
                            </tr>

                            <?php
                            $result = $conn->query("SELECT * FROM `assign_buss` WHERE `source`='$source' and `destination`='$desti'");
                            if ($result->num_rows > 0) {
                                $result_d = $conn->query("SELECT * FROM `assign_buss` WHERE `j_date`='$date'");
                                if ($result_d->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // `buss_id`, `source`, `destination`, `payment_amount`
                                        $buss_id = $row['buss_id'];
                                        $source = $row['source'];
                                        $desti = $row['destination'];
                                        $payment_amount = $row['payment_amount'];

                                        $result_buss = $conn->query("SELECT * FROM `buss` WHERE `plate_no`='$buss_id'");
                                        while ($row_buss = $result_buss->fetch_assoc()) {

                                            $holding_capacity = $row_buss['holding_capacity'];
                                            $level = $row_buss['level'];
                                        }
                            ?>
                                        <form method="post" action="view-status-2.php">
                                            <tr>
                                                <td><?php print $li; ?></td>
                                                <td>
                                                    <input type="text" name="source" value="<?php print $_POST['source'] ?>" hidden>
                                                    <input type="text" name="desti" value="<?php print $_POST['desti'] ?>" hidden>
                                                    <input type="text" name="date" value="<?php print $_POST['date'] ?>" hidden>
                                                </td>
                                                <td><input type="text" name="buss_id" value="<?php print $buss_id ?>" style="width: 100px;"></td>
                                                <td><input type="text" name="level" value="<?php print $level ?>" style="width: 75px;"></td>
                                                <td><input type="text" name="payment_amount" value="<?php print $payment_amount ?>" style="width: 75px;"></td>
                                                <td><input type="text" name="holding_capacity" value="<?php print $holding_capacity ?>" style="width: 100px;"></td>

                                                <?php $result_current_set = $conn->query("SELECT * FROM `reserved_journey` WHERE `buss_id`='$buss_id'");
                                                if ($result_current_set->num_rows > 0) {
                                                    $r_current_set = ($result_current_set->num_rows) + 1;
                                                } else {
                                                    $r_current_set = 1;
                                                }  ?>

                                                <td><input type="text" name="result_current_set" value="<?php print $r_current_set."-".$holding_capacity ?>" style="width: 75px;"></td>
                                                <td><button type="submit" name="next" class="btn btn-primary"><?php echo htmlspecialchars($lang['next']); ?></button></td>
                                            </tr>
                                        </form>
                            <?php
                                        $li++;
                                    }
                                } else {
                                    print "<div class='alert alert-danger'>
                                <strong>" . htmlspecialchars($lang['sorry']) . "</strong> " . htmlspecialchars($lang['sorry_m']) . "!!
                            </div>";
                                }
                            } else {
                                print "<div class='alert alert-danger'>
                                <strong>" . htmlspecialchars($lang['sorry']) . "</strong> " . htmlspecialchars($lang['sorry_j']) . "!!
                            </div>";
                            }
                            ?>
                        </table>
                    </div>
                <?php
                }

                ?>
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