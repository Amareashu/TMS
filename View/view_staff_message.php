<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>message</title>
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
                    <h3 class="text-center rounded"><?php echo htmlspecialchars($lang['message']); ?></h3>
                    <hr>
                    <?php

                    $result = $conn->query("SELECT * FROM `message` ");

                    $result = $conn->query("SELECT * FROM `message` WHERE  `id`='$_GET[c_id]'");
                    $conn->query("UPDATE  `message` SET `status`='View' WHERE  `id`='$_GET[c_id]'");

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["id"]; 
                            $sender = $row["sender"]; 
                            $date = $row["date"];
                            $message = $row["message"];
                        }
                    }

                    ?>

                    <div class='alert alert-success'>
                        <strong><?php echo htmlspecialchars($lang['sender']); ?>  : </strong> <?php print $sender ?>
                    </div>

                    <div class='alert alert-success'>
                        <strong><?php echo htmlspecialchars($lang['message']); ?> : </strong> <?php print $message ?>
                    </div>
                    <div class='alert alert-success'>
                        <strong><?php echo htmlspecialchars($lang['s-date']); ?> : </strong> <?php print $date ?>
                    </div>

                    <div class='text-center'>

                        <a href='http://localhost/TMS/view/staff_message.php?'><button class='btn-info rounded'>
                        <?php echo htmlspecialchars($lang['back']); ?>
                        </button></a>
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