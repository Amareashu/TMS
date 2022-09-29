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

                    $b_no = $_POST['b_no'];
                    $level = $_POST['level'];
                    $h_capa = $_POST['h_capa'];

                    $b_noerror = chickP_no($b_no);

                    if ($b_noerror == "") {

                        if ($conn->query("INSERT INTO `buss`(`plate_no`, `level`, `holding_capacity`) VALUES 
                            ('$b_no','$level','$h_capa')")) {
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
                }

                function  chickP_no($data)
                {
                    if (!preg_match("/^[ET-]{1,3}[0-9]*$/", $data)) {
                        return   "<div class='alert alert-danger'>
                                <strong>Warning!</strong> invalid plate number!!
                            </div>";
                    } else if (strlen($data) == 10) {
                        return   "";
                    } else {
                        return "<div class='alert alert-danger'>
                        <strong>Warning!</strong> invalid plate number!!
                    </div>";
                    }
                }

                ?>

                <hr>

                <h3 class="rounded">
                    <?php echo htmlspecialchars($lang['register-new-bus']); ?></h3>
                <div id="inform">
                    <i><?php print $info ?></i>
                </div>
                <hr>

                <div id="re_form">
                    <form method="POST" class="row g-3">
                        <div class="col-md-12">
                            <label for="uname" class="form-label"><?php echo htmlspecialchars($lang['b/no']); ?> * <?php print $b_noerror ?> </label>
                            <input title="Hint: ET-1010233" maxlength="10" minlength="10" name="b_no" type="text" value="ET-" class="form-control" required>
                        </div>

                        <div class="col-md-12">
                            <label for="uname" class="form-label"><?php echo htmlspecialchars($lang['level']); ?></label>
                            <select id="level" name="level" class="form-select" required>
                                <option></option>
                                <option>Level I</option>
                                <option>Level II</option>
                                <option>Level III</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="password" class="form-label"><?php echo htmlspecialchars($lang['h/capacity']); ?></label>
                            <input name="h_capa" min="30" max="80" type="number" class="form-control" required>
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