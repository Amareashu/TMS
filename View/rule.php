<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>vison</title>
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
                    <h3 class="text-center rounded"><?php echo htmlspecialchars($lang['rule-t']); ?></h3>
                    <hr>
                    <div class="input-group mb-3 table-responsive">
                        <h5> <?php echo htmlspecialchars($lang['rule-1']); ?> </h5>
                        <h5> <?php echo htmlspecialchars($lang['rule-2']); ?></h5>
                        <h5> <?php echo htmlspecialchars($lang['rule-3']); ?></h5>
                        <h5> <?php echo htmlspecialchars($lang['rule-4']); ?></h5>
                        <h5> <?php echo htmlspecialchars($lang['rule-5']); ?></h5>
                        <h5> <?php echo htmlspecialchars($lang['rule-6']); ?></h5>
                        <h5> <?php echo htmlspecialchars($lang['rule-7']); ?></h5>
                        <h5> <?php echo htmlspecialchars($lang['rule-8']); ?></h5>
                        <h5> <?php echo htmlspecialchars($lang['rule-9']); ?></h5>
                        <h5> <?php echo htmlspecialchars($lang['rule-10']); ?></h5>
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