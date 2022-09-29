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
    $info = $payment_error = $info_p = "";
    $r_of_till = "";
    ?>
    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            include("..//r_side_menu.php");
            ?>

            <div class="div2 row col-lg-6 rounded  rounded bg-secondary" id="body">
                <?php
                $fname = $phone = $tellerror = "";

                if (isset($_POST['recharge'])) {

                    $owner = $_POST['fname'];
                    $phone = $_POST['phone'];
                    $no_ticket = $_POST['no_ticket'];
                    $fname = $owner;
                    $deposit = $_POST['deposit'];
                    $conn->query("UPDATE `tele-birr-wallet` SET `amount`=`amount`+ '$deposit' WHERE `phone` = '$phone'");
                    $info_p =
                        "<div class='alert alert-success'>
                               <strong>Success!</strong> Your are successful deposited $deposit birr on telebirr wallet. 
                            </div>";
                }

                if (isset($_POST['register'])) {

                    $owner = $_POST['fname'];
                    $phone = $_POST['tell_birr'];
                    $fname = $owner;

                    $r_of_till = $phone;
                    $t_query = "INSERT INTO  `tele-birr-wallet`(`owner`,`phone`, `amount`) VALUES ('$owner','$phone','17')";
                    if ($conn->query($t_query)) {
                        $info_p =
                            "<div class='alert alert-success'>
                               <strong>Success!</strong> Your are successful registred on telebirr wallet. 
                            </div>";
                        $info = '';
                    } else {
                        print $conn->error;
                    }
                }
                $recharg = "";

                if (isset($_POST['reserve'])) {

                    $source = $_POST['source'];
                    $desti = $_POST['desti'];
                    $date = $_POST['date'];

                    $buss_id = $_POST['buss_id'];
                    $level = $_POST['level'];
                    $payment_amount = $_POST['payment_amount'];
                    $holding_capacity = $_POST['holding_capacity'];
                    $result_current_set = $_POST['result_current_set'];

                    $fname = $_POST['fname'];
                    $phone = $_POST['phone'];
                    $tell_birr = $_POST['tell_birr'];
                    $no_ticket = $_POST['no_ticket'];

                    $result = $conn->query("SELECT * FROM `tele-birr-wallet`WHERE `phone` = '$tell_birr'");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $total_amount = $payment_amount * $no_ticket;
                            if ($row['amount'] > $total_amount) {

                                $username = "UTMS" . rand(5000, 9000);
                                $password = "PTMS" . rand(1000, 5000);
                                $pass_id = rand(10, 5000);

                                $db_password = base64_encode($password);

                                $account_query = "INSERT INTO  
                                    `account`(`username`, `password`,`role`, `user_id`) VALUES
                                    ('$username','$db_password','Passenger','$pass_id')";
                                if ($conn->query($account_query)) {

                                    for ($x = 0; $x < $no_ticket; $x++) {
                                        $tickt_no = rand(1000, 5000);
                                        $reserv_query = "INSERT INTO  `reserved_journey`
                                    (`buss_id`, `pass_id`, `full-name`, `phone`, `journey_date`, `amount`, `tickt_no`,`seat_no`) VALUES
                                    ('$buss_id','$pass_id','$fname','$phone','$date','$payment_amount','$tickt_no','$result_current_set')";
                                        $conn->query($reserv_query);

                                        $conn->query("UPDATE `tele-birr-wallet` SET `amount`=`amount`- '$payment_amount' WHERE `phone` = '$tell_birr'");

                                        $result_current_set++;
                                    }

                                    $conn->query("UPDATE `tele-birr-wallet` SET `amount`=`amount`+ '$total_amount' WHERE `owner` = 'ABTS'");

                                    $info =
                                        "<div class='alert alert-success'>
                                            <strong>" . htmlspecialchars($lang['s']) . "!</strong> " . htmlspecialchars($lang['r_success']) . " <br>
                                            </div>
                                            <div class='alert alert-info'
                                            <strong>NB!</strong><br>
                                            <u>Don't Shere to Others!</u><br>
                                            <strong>Username!</strong> $username<strong> <br>
                                             Password!</strong> $password.<br>
                                             <strong> Paid Valance!</strong> $payment_amount X $no_ticket = $total_amount
                                            </div>";
                                    $info_p = "";
                                }
                                print $conn->error;
                            } else {
                                $info =
                                    "<div class='alert alert-danger'>
                                        <strong>" . htmlspecialchars($lang['w']) . "</strong> You have not enugh amount!!
                                    </div>";
                                $info_p = "";
                                $recharg = "insef";
                            }
                        }
                    } else {
                        $info =
                            "<div class='alert alert-danger'>
                                <strong>" . htmlspecialchars($lang['w']) . "</strong> Your phone is not register on tell-birr wallet!!
                            </div>";
                        $tellerror = "error";
                        $info_p = "";
                    }
                }
                if (empty($payment_error)) {
                }



                ?>
                <form method="post" action="" style="font-family: 'Times New Roman', Times, serif;">

                    <input type="text" name="source" value="<?php print $_POST['source'] ?>" hidden>
                    <input type="text" name="desti" value="<?php print $_POST['desti'] ?>" hidden>
                    <input type="text" name="date" value="<?php print $_POST['date'] ?>" hidden>
                    <input type="text" name="buss_id" value="<?php print $_POST['buss_id'] ?>" hidden>
                    <input type="text" name="level" value="<?php print $_POST['level'] ?>" hidden>
                    <input type="text" name="payment_amount" value="<?php print $_POST['payment_amount'] ?>" hidden>
                    <input type="text" name="holding_capacity" value="<?php print $_POST['holding_capacity'] ?>" hidden>
                    <input type="text" name="result_current_set" value="<?php print $_POST['result_current_set'] ?>" hidden>

                    <div class="form-group">
                        <div class="form-group table-responsive">
                            <hr>
                            <h3 for="source"><?php echo htmlspecialchars($lang['passenger-info']); ?></h3>
                            <hr>
                            <?php print $info; ?>
                            <?php print $info_p; ?>
                            <div class="form-group">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo htmlspecialchars($lang['full-name']); ?></span>
                                    </div>
                                    <input type="text" class="form-control" name="fname" value="<?php print $fname ?>" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo htmlspecialchars($lang['phone']); ?></span>
                                    </div>
                                    <input type="text" class="form-control" name="phone" value="<?php print $phone ?>" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo htmlspecialchars($lang['no_ticket']); ?></span>
                                    </div>
                                    <input type="number" max='10' min='1' class="form-control" name="no_ticket" value="<?php print $no_ticket ?>" required>
                                </div>

                                <?php print $payment_error; ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo htmlspecialchars($lang['payment/m']);
                                                                        echo htmlspecialchars($lang['tell-birr']);  ?></span>
                                    </div>
                                    <input type="text" class="form-control" name="tell_birr" maxlength="10" minlength="10" value="<?php print $phone ?>" placeholder="please start yur phone - 09******">
                                </div>
                                <div class="input-group-append">
                                    <button name="reserve" class="btn btn-primary"><?php echo htmlspecialchars($lang['reserv']); ?> </button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </form>

                <form method="post" action="" style="font-family: 'Times New Roman', Times, serif;">
                    <?php
                    if ($tellerror == "") {
                    } else {
                    ?>
                        <input type="text" name="source" value="<?php print $_POST['source'] ?>" hidden>
                        <input type="text" name="desti" value="<?php print $_POST['desti'] ?>" hidden>
                        <input type="text" name="date" value="<?php print $_POST['date'] ?>" hidden>
                        <input type="text" name="buss_id" value="<?php print $_POST['buss_id'] ?>" hidden>
                        <input type="text" name="level" value="<?php print $_POST['level'] ?>" hidden>
                        <input type="text" name="payment_amount" value="<?php print $_POST['payment_amount'] ?>" hidden>
                        <input type="text" name="holding_capacity" value="<?php print $_POST['holding_capacity'] ?>" hidden>
                        <input type="text" name="result_current_set" value="<?php print $_POST['result_current_set'] ?>" hidden>
                        <input type="text" name="fname" value="<?php print $_POST['fname'] ?>" hidden>
                        <input type="text" name="phone" value="<?php print $_POST['phone'] ?>" hidden>
                        <input type="text" name="no_ticket" value="<?php print $_POST['no_ticket'] ?>" hidden>

                        <br>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?php echo htmlspecialchars($lang['register']); ?> </span>
                            </div>
                            <input type="text" class="form-control" name="tell_birr" maxlength="10" minlength="10" value="<?php print $_POST['tell_birr'] ?>">
                        </div>

                        <div class="input-group-append">
                            <button name="register" class="btn btn-primary">Register</button>
                        </div>
                        <hr>
                    <?php
                    }
                    ?>
                </form>

                <?php

                if ($recharg == "insef") {
                ?>

                    <form action="" method="POST">

                        <input type="text" name="source" value="<?php print $_POST['source'] ?>" hidden>
                        <input type="text" name="desti" value="<?php print $_POST['desti'] ?>" hidden>
                        <input type="text" name="date" value="<?php print $_POST['date'] ?>" hidden>
                        <input type="text" name="buss_id" value="<?php print $_POST['buss_id'] ?>" hidden>
                        <input type="text" name="level" value="<?php print $_POST['level'] ?>" hidden>
                        <input type="text" name="payment_amount" value="<?php print $_POST['payment_amount'] ?>" hidden>
                        <input type="text" name="holding_capacity" value="<?php print $_POST['holding_capacity'] ?>" hidden>
                        <input type="text" name="result_current_set" value="<?php print $_POST['result_current_set'] ?>" hidden>
                        <input type="text" name="fname" value="<?php print $_POST['fname'] ?>" hidden>
                        <input type="text" name="phone" value="<?php print $_POST['phone'] ?>" hidden>
                        <input type="text" name="no_ticket" value="<?php print $_POST['no_ticket'] ?>" hidden>


                        <div style="text-align: left;">

                            <b><label class="col-md-4 control-label" for="email">Recharge Money</label></b>
                            <div class="col-md-12">
                                <input name="deposit" type="number" min="0" placeholder="Enter Amount" class="form-control" required>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <button type="submit" name="recharge" style="width: 30%;" class="btn btn-primary">Recharged</button>
                                <div class="col-md-12">
                                </div>
                            </div>
                            <hr>
                        </div>
                    </form>

                <?php }
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