<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>register f</title>
    <style>
        label {
            font-size: 20px;
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
                $b_noerror = $passerror = $info = "";
                if (isset($_POST['register'])) {

                    $sourse = $_POST['sourse'];
                    $desti = $_POST['desti'];
                    $payment = $_POST['payment'];

                        if ($conn->query("INSERT INTO `journy-list`(`sourse`, `desti`, `payment`) VALUES 
                            ('$sourse','$desti','$payment')")) {
                            $info =
                                "<div class='alert alert-success'>
                            <strong>Success!</strong> Your are successful registerd. 
                             </div>";
                        } else {
                            $info = "<div class='alert alert-danger'>
                                <strong>Warning!</strong>!!
                            " . $conn->error . "</div>";
                        }
                    }
  
                ?>
                <hr>

                <h3 class="rounded">
                    <?php echo htmlspecialchars($lang['register-new-Journey']); ?></h3>
                <div id="inform">
                    <i><?php print $info ?></i>
                </div>
                <hr>

                <div id="re_form">
                    <form method="POST" class="row g-3">
                        <div class="col-md-12">
                            <label for="uname" class="form-label"><?php echo htmlspecialchars($lang['sourse']); ?> * </label>
                            <input name="sourse" type="text" class="form-control" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label"><?php echo htmlspecialchars($lang['desti']); ?></label>
                            <input name="desti" type="text" class="form-control" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label"><?php echo htmlspecialchars($lang['payment']); ?></label>
                            <input name="payment" type="number" min='0' class="form-control" required>
                        </div>

                        <div class="col-6 text-center">
                            <button type="submit" name="register" class="btn btn-primary"><?php echo htmlspecialchars($lang['next']); ?></button>
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