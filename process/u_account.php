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
                    $id = $_POST['user_id'];
                    $role = $_POST['role'];
                    $password = $_POST['password'];
                    $re_password = $_POST['re_password'];

                    $unerror = chickString($user_name);

                    $passerror = chickMuch($password, $re_password);

                    $info = $passerror;

                    if ($unerror == "" && $passerror == "") {
                        $password = base64_encode($password);
                        //`username`, `password`, `role`, `user_id`
                        if (($conn->query("UPDATE `account` SET `username`='$user_name',`role`='$role',`password`='$password' WHERE id = '$id'"))
                        ) {
                            $info = 
                            "<div class='alert alert-success'>
                               <strong>Success!</strong> Your are successful updated. 
                            </div>";
                            $acc_no= $_GET['acc_no'];

                            $result = $conn->query("SELECT * FROM `account` where `id`='$acc_no'");
    
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $id = $row["id"];
                                       $username_d= $row["username"];
                                       $password=base64_decode($row["password"]); 
                                       $role=$row["role"];
    
                                    }
                                }
                        } else {
                            $info = "<i style='color: red'>Smoe Error occoured" . $conn->error . "</i>";
                        }
                    }
                }

                function  chickString($data)
                {
                    if (!preg_match("/^[a-zA-Z- 0-9]*$/", $data)) {
                        return "<div class='alert alert-danger'>
                        <strong>Warning!</strong> invalid User Name. 
                     </div>";
                    } else {
                        return "";
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

                <hr>

                <h3 class="rounded">
                    <?php echo htmlspecialchars($lang['update-account']); ?></h3>
                <div id="inform">
                    <i><?php print $info ?></i>
                </div>
                <hr>

                <?php
                        $acc_no= $_GET['acc_no'];

                        $result = $conn->query("SELECT * FROM `account` where `id`='$acc_no'");

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row["id"];
                                   $username_d= $row["username"];
                                   $password=base64_decode($row["password"]); 
                                   $role=$row["role"];

                                }
                            }

                    ?>

                <div id="re_form">
                    <form method="POST" class="row g-3">
                        <div class="col-md-6">
                            <label for="uname" class="form-label"><?php echo htmlspecialchars($lang['username']); ?> * <?php print $unerror ?> </label>
                            <input title="Hint: sme123123" name="user_name" type="text" class="form-control" value="<?php print $username_d ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label for="uname" class="form-label">User ID * <?php print $unerror ?> </label>
                            <input title="Hint: some123" name="user_id" value="<?php print $id ?>" type="text" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label"><?php echo htmlspecialchars($lang['password']); ?></label>
                            <input title="Hint: user123" maxlength="10" minlength="6" value="<?php print $password ?>" name="password" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Role</label>
                            <select id="role" name="role" class="form-select" required>
                                <option><?php print $role ?></option>
                                <option>Manager</option>
                                <option>Ticket officer</option>
                                <option>System admin</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="re_password" class="form-label">Re-Enter Password</label>
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