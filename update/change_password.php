<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>change password</title>
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
                $passerror = $uname=$password= $info="";

                if (isset($_POST['register'])) {

                    $uname = $_POST['uname'];

                    $password = $_POST['password'];
                    $re_password = $_POST['re_password'];

                    $passerror = chickMuch($password, $re_password);

                    $result_uname = $conn->query("SELECT * FROM `account` where `username`='$uname'");

                    if ($passerror == "") {
                        if ($result_uname->num_rows > 0) {
                            
                            $db_password = base64_encode($password);
                            if ($conn->query("UPDATE `account` SET `password`='$db_password' WHERE`username`='$uname'")) {
                                $info =
                                    "<div class='alert alert-success'>
                                      <strong>Success!</strong> Your are successful updated. 
                                </div>";
                            } else {
                                $info = "<div class='alert alert-danger'>
                                    <strong>Warning!</strong>!!
                                " . $conn->error . "</div>";
                            }
                        } else {
                            $info = "<div class='alert alert-danger'>
                                <strong>Warning!</strong> You Enterd invalid username!!
                            " . $conn->error . "</div>";
                        }
                    }else{
                        $info = $passerror;
                    }
                }
                function  chickMuch($data, $data2)
                {
                    if ($data == $data2) {
                        return  "";
                    } else {
                        return "<div class='alert alert-danger'>
                        <strong>Warning!</strong> Password not much. 
                     </div>";
                    }
                }

                ?>
                <form method="post" style="font-family: 'Times New Roman', Times, serif;">
                    <hr>
                    <h3><?php echo htmlspecialchars($lang['reseat-password']); ?></h3>
                    
                    <hr>
                    <div class="form-group" style="padding-left:15%;">
                    <div class="col-md-10">
                        <?php  print $info; ?>
                    </div>
                        <div class="col-md-10">
                            <label for="password" class="form-label"><?php echo htmlspecialchars($lang['o_username']); ?></label>
                            <input maxlength="10" minlength="6" name="uname" type="text" value="<?php print $uname; ?>" class="form-control" required>
                        </div>

                        <div class="col-md-10">
                            <label for="password" class="form-label"><?php echo htmlspecialchars($lang['n_pass']); ?></label>
                            <input maxlength="10" minlength="6" name="password" type="text" value="<?php print $password; ?>" class="form-control" required>
                        </div>

                        <div class="col-md-10">
                            <label for="re_password" class="form-label"> <?php echo htmlspecialchars($lang['re_password']); ?></label> 
                            <input title="This fild must be much to password" name="re_password" type="text" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="col-6 text-center">
                        <button type="submit" name="register" class="btn btn-primary"><?php echo htmlspecialchars($lang['save']); ?></button>
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