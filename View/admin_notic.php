<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>notice</title>
    <style>
        table {
            font-family: 'times new roman';
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

            <div class="col-lg-12 bg-light rounded">
                <hr>
                <h3 class="rounded" style="
        background-color: rgb(56, 52, 52); 
        text-align: center; 
        color: wheat;
        font-family: 'Times New Roman';">
                    Notification</h3>
                <hr>
                <?php
                include("../connection.php");
                ?>
                <div class="col-lg-12 rounded  rounded bg-secondary">
                    <br>

                    <?php
                    $subject =  "";
                    $message = "";
                    $date = "";
                    $sql = "SELECT * FROM `notic`";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $subject =  $row['subject'];
                            $message = $row['message'];
                            $date = $row['date'];
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                    <p class='rounded' style="font-family: 'Times New Roman', Times, serif; margin-right: 20%;">
                        <?php print "Date: " . $date; ?>
                    </p>
                    <u>
                        <p class=' rounded' style="font-family: 'Times New Roman', Times, serif">
                            <?php print $subject; ?>
                        </p>
                    </u>
                    <h4 class=' rounded' style="font-family: 'Times New Roman', Times, serif">
                        <?php print $message; ?>
                    </h4>

                </div>

            </div>
        </div>
    </div>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
    <?php include("..//footer.php"); ?>
</body>

</html>