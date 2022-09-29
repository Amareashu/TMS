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
            margin-left: 30%;
            margin-top: 2%;
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
            <div class="col-lg-10" id="body">
                <?php
                if (isset($_POST['login'])) {
                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];

                    $info = $user_name . $password;
                    $sql_query = "SELECT * FROM account WHERE username = '$user_name'";
                    $result = $conn->query($sql_query);

                    if (@$result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                            $password = base64_encode($password);

                            //check username and password
                            if ($row['username'] == $user_name && $row['password'] == $password) {
                                $status = $row['status'];

                                if ("Deactive" == $status) {
                                    $info = "<div class='alert alert-danger'>
                                    <strong>" . htmlspecialchars($lang['w']) . "</strong> " . htmlspecialchars($lang['w_a_b']) . "!!
                                </div>";
                                } else {
                                    $info = "";

                                    $_SESSION['role'] = $row['role'];
                                    $_SESSION['user_id'] = $row['user_id'];
                                    $user_id = $row['user_id'];

                                    header("Location:http://localhost/TMS/index.php");
                                }
                            } else {
                                $info = "<div class='alert alert-danger'>
                                                <strong>" . htmlspecialchars($lang['w']) . "</strong> " . htmlspecialchars($lang['w_l_p']) . "!!
                                        </div>";
                            }
                        }
                    } else {
                        $info = "<div class='alert alert-danger'>
                                                    <strong>" . htmlspecialchars($lang['w']) . "</strong>" . htmlspecialchars($lang['w_l_u']) . "!!
                                            </div>";
                    }
                }

                ?>

                <form class="row g-4" method="post">
                    <div class="row col-md-6 rounded" id="login">

                        <h3 class="text-center rounded"><?php echo htmlspecialchars($lang['login-f']); ?></h3>

                        <?php print $info; ?>

                        <div class="mb-3">
                            <label for="" class="form-label"><?php echo htmlspecialchars($lang['username']); ?> *</label>
                            <input type="text" class="form-control" name="user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"><?php echo htmlspecialchars($lang['pass']); ?> *</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="col-6">
                            <button type="submit" name="login" style="width: 70%; margin:10%" class="btn btn-primary"><?php echo htmlspecialchars($lang['login']); ?> </button>
                        </div>
                        <div class="col-6">
                            <button type="reset" style="width: 70%; margin:10%" class="btn btn-danger"><?php echo htmlspecialchars($lang['reset']); ?></button>
                        </div>
                        <div>
                            <a href="http://localhost/TMS/index/forgot_password.php"><?php echo htmlspecialchars($lang['forgt-p']); ?></a>
                        </div>
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