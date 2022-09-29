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
                    $j_no = $_GET['j_no'];
                    $p_no = $_GET['p_no'];
                    
                    $result = $conn->query("SELECT * FROM `assign_buss` WHERE `id`='$j_no'");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $sourse = $row['source'];
                            $destination = $row['destination'];
                        }
                    }



                    if (isset($_POST['register'])) {

                        $plate_no=$_POST['plate_no'];

                        $update_query1 = "UPDATE `buss` SET `status`='reserved' WHERE `plate_no`='$plate_no'";

                        $update_query2 = "UPDATE `buss` SET `status`='Active' WHERE `plate_no`='$p_no'";

                        $update_query3 = "UPDATE `assign_buss` SET `buss_id`='$plate_no' WHERE`id`='$j_no'";

                        $update_query4 = "UPDATE `reserved_journey` SET `buss_id`='$plate_no' WHERE`buss_id`='$p_no'";

                        $post_date=date("Y-m-d");

                        $update_query5 = "INSERT INTO `notice`(`subject`, `message`, `date`)
                                                          VALUES ('የመኪና ለውጥ','ክቡራን አና ክብራት ባጋጠመን የቴክኒክ ችግር ምክንያት በ$p_no መኪና ወደ $plate_no የተቀየረ መሆኑን በትህትና እናሳውቃለን','$post_date')";

                        if ($conn->query($update_query1)&&$conn->query($update_query2)&&$conn->query($update_query3)&&$conn->query($update_query4)&&$conn->query($update_query5)) {
                            $info =
                                "<div class='alert alert-success'>
                                           <strong>Success!</strong> Your are successful Updated. 
                                        </div>";
                        } else {
                            $info =
                                "<div class='alert alert-success'>
                                           <strong>Error!</strong> " . $conn->error . "
                                        </div>";
                        }
                    }


                    ?>

                    <h3><?php echo htmlspecialchars($lang['change-buss']); ?></h3>
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
                        <br>
                        <label for="source"><?php echo htmlspecialchars($lang['sourse']); ?></label>
                        <select class="form-control" id="source" name="source" required>
                            <option selected><?php print $sourse ?></option>
                        </select>
                        <br>
                        <label for="desti"><?php echo htmlspecialchars($lang['desti']); ?>:</label>
                        <select class="form-control" id="desti" name="desti" required>
                            <option selected><?php print $destination ?></option>
                        </select>
                    </div>
                    <br>
                    <div class="text-left">
                        <button type="submit" name="register" class="btn btn-primary">Next</button>
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