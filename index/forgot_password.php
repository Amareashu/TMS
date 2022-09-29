<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <link rel="stylesheet" href="..//style/css/icon.css">
    <title>Login Form</title>
    <style>
        #login {
            padding: 5%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
            background-color: #fff;
            margin-left: 20%;
            margin-top: 1%;
            width: 60%;
        }

        label {
            font-family: 'Times New Roman';
            font-weight: bold;
            font-size: 110%;
        }

        i {
            color: red;
            font-family: 'times new roman';
            font-weight: bold;
        }
    </style>
</head>
<?php
include("..//connection.php");
?>

<body style="background-color: gray;">
    <?php
    include("..//menu.php");
    ?>
    <div class="container-fluid">
        <b>
            <hr>
        </b>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            $info = "";
            ?>
            <div class="col-lg-12" id="body">
                <?php
                $unerror = $passerror = "";
                if (isset($_POST['save'])) {

                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];
                    $re_password = $_POST['r_password'];

                    $passerror = chickMuch($password, $re_password);

                    $info = $passerror;

                    $sql_query = "SELECT * FROM account WHERE username = '$user_name'";

                    $result = $conn->query($sql_query);

                    if ($result->num_rows > 0) {
                        if ($info == "" && $passerror == "") {

                            $password = base64_encode($password);

                            if ($conn->query("UPDATE `account` SET  `password`= '$password'
                                     WHERE `username` = '$user_name'")) {
                                $info = "<h5 style='color: blue;'>You are successfully reset your password now you can login!!</h5>";
                                $_SESSION['no_login_message']=$info;
                                header("Location:http://localhost/HSRS/log/login.php");
                            } else {
                                $info = "<i style='color: red'>Some Errors occured. please try again</i>";
                            }
                            
                        }
                    } else {
                        $info = "<i>You Enterd Inavalid User Name !!</i>";
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

                <form class="row g-4" method="post">
                    <div class="row col-md-8 rounded" id="login">

                        <h3 class="text-center rounded">Forgot password</h3>

                        <?php print $info; ?>

                        <div class="mb-3">
                            <label for="" class="form-label">Pleae Enter User Name *</label>
                            <input type="text" class="form-control" name="user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter New Password *</label>
                            <input type="password" maxlength="12" minlength="6" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Re Enter New Password *</label>
                            <input type="password" maxlength="12" minlength="6" class="form-control" name="r_password" required>
                        </div>

                        <div class="col-6">
                            <button type="submit" name="save" style="width: 70%; margin:10%" class="btn btn-primary">Save</button>
                        </div>
                        <div class="col-6">
                            <button type="reset" style="width: 70%; margin:10%" class="btn btn-danger">Clear</button>
                        </div>
                </form>
            </div>
        </div>
        <hr>
    </div>
    <?php include("..//footer.php") ?>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
</body>

</html>