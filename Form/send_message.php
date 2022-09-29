<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>post notice</title>
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
            include("..//r_side_menu.php")
            ?>

            <div class="div2 row col-lg-6 rounded  rounded bg-secondary" id="body">
                <?php
                $passerror = $uname = $password = $info = "";
                $role = $_SESSION["role"];
                if (isset($_POST['send'])) {

                    $recever = $_POST['recever'];
                    $message = $_POST['message'];
                    $post_date = date("Y-m-d");

                    $post_sql = "INSERT INTO `message`(`sender`, `recever`, `message`, `date`)
                                                          VALUES ('$role','$recever','$message','$post_date')";
                    if ($conn->query($post_sql)) {
                        $info = "<div class='alert alert-success col-lg-12'>
                                              <strong>Successful!</strong>
                                          </div>";
                    } else {
                        $info = "<div class='alert alert-danger'>
                                <strong>Warning!</strong>!!
                            " . $conn->error . "</div>";
                    }
                }


                ?>
                <form method="post" style="font-family: 'Times New Roman', Times, serif;">
                    <hr>

                    <div class="form-group" style="padding-left:15%;">
                        <div class="col-md-10">
                            <h3><?php echo htmlspecialchars($lang['send_message']); ?></h3>
                            <hr>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group mt-3">
                                <?php
                                print $info;
                                ?>
                                <label for="gender" class="form-label"><?php echo htmlspecialchars($lang['recever']); ?></label>
                                <select id="role" name="recever" class="form-select" required>
                                    <option></option>
                                    <option>Manager</option>
                                    <option>Ticket officer</option>
                                    <option>System admin</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-group col-md-12">
                                <label for="username"><?php echo htmlspecialchars($lang['message']); ?></label>
                                <textarea class="form-control" name="message" rows="4" required></textarea>
                            </div>
                            <br>
                            <div class="col-6 text-center">
                                <button type="submit" name="send" class="btn btn-primary"><?php echo htmlspecialchars($lang['save']); ?></button>
                            </div>
                        </div>

                    </div>

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