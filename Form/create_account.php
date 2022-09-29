<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>cereate account</title>
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
                $unerror = $passerror = $info = "";
                if (isset($_POST['register'])) {

                    $user_name = $_POST['user_name'];
                    $user_id = $_POST['user_id'];
                    $role = $_POST['role'];
                    $password = $_POST['password'];
                    $re_password = $_POST['re_password'];

                    $unerror = chickString($user_name);

                    $passerror = chickMuch($password, $re_password);

                    $info = $passerror;

                    $result_uname = $conn->query("SELECT * FROM `account` where `username`='$user_name'");

                    if ($result_uname->num_rows > 0) {

                        $info = "<div class='alert alert-danger'>
                                                <strong>Warning!</strong> Username is taken by onther user!!
                                        </div>";
                    } else {
                        if ($unerror == "" && $passerror == "") {
                            $password = base64_encode($password);
                            $create_sql = "INSERT INTO account (`username`, `password`, `role`, `user_id`) VALUES 
                        ('$user_name','$password','$role','$user_id')";
                            if ($conn->query($create_sql)) {
                                $info = "<div class='alert alert-success col-lg-12'>
                            <strong>Successful!</strong>
                        </div>";
                            } else {
                                $info = "<div class='alert alert-danger'>
                                <strong>Warning!</strong>!!
                            " . $conn->error . "</div>";
                            }
                        }
                    }
                }

                function  chickString($data)
                {
                    if (!preg_match("/^[a-zA-Z- 0-9]*$/", $data)) {
                        return " <i style='color: red'>Invaild  user name </i>";
                    } else {
                        return "";
                    }
                }
                function  chickMuch($data, $data2)
                {
                    if ($data == $data2) {
                        return  "";
                    } else {
                        return "<i style='color: red'>Password is no much</i>";
                    }
                }

                ?>

                <hr>

                <h3 class="rounded">
                    <?php echo htmlspecialchars($lang['create-account']); ?></h3>
                <div id="inform">
                    <i><?php print $info ?></i>
                </div>
                <hr>

                <div id="re_form">
                    <form method="POST" class="row g-3">
                        <div class="col-md-6">
                            <label for="uname" class="form-label"><?php echo htmlspecialchars($lang['username']); ?> * <?php print $unerror ?> </label>
                            <input title="Hint: sme123123" name="user_name" type="text" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="uname" class="form-label">User ID * <?php print $unerror ?> </label>
                            <input title="Hint: some123" name="user_id" type="text" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label"><?php echo htmlspecialchars($lang['password']); ?></label>
                            <input title="Hint: user123" maxlength="10" minlength="6" name="password" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label"><?php echo htmlspecialchars($lang['role']); ?></label>
                            <select id="role" name="role" class="form-select" required>
                                <option>Manager</option>
                                <option>Ticket officer</option>
                                <option>System admin</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="re_password" class="form-label"><?php echo htmlspecialchars($lang['re_password']); ?></label>
                            <input title="This fild must be much to password" name="re_password" type="text" class="form-control" required>
                        </div>
                        <!--empity div -->
                        <div class="col-md-6">
                            <label for="email" class="form-label"></label>
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