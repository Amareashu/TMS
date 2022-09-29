<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS</title>
</head>

<body>
    <?php
    session_start();
    include 'Language/lang.php';
    include("connection.php");
    include("image_menu.php");
    $not = 0;

    $r1 = $conn->query("SELECT * FROM `feedback` WHERE `status`='un_view'");
    $not = $r1->num_rows;

    ?>
    <nav style="background-color: rgb(53, 46, 38);" class="navbar navbar-expand-md navbar-dark bg-drk mt-1 rounded text-center">
        <div class="container">
            <a href="#" class="navbar-brand" id="navbar-brand">

            </a>
            <button type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav me-auto">
                </ul>
                <li class="nav-link"><a href="http://localhost/TMS/index.php?"><?php echo htmlspecialchars($lang['home']); ?></a> </li>

                <?php
                if (isset($_SESSION['role'])) {
                    $no_message = "";
                    $sql = "SELECT * FROM `comment` WHERE `status`='un_view'";
                    $result = $conn->query($sql);
                    $no_message = $result->num_rows;

                    if ($_SESSION['role'] == "Manager") {
                ?>
                        <li class="nav-link"><a href="http://localhost/TMS/view/message.php?"><?php echo htmlspecialchars($lang['feedback']); ?>
                                <sup style="color: red;"><?php print $no_message ?></sup></a></li>
                    <?php
                    }
                    $role = $_SESSION['role'];
                    if ($role == "Manager" || $role == "Ticket officer"|| $role == "System admin") {
                        $sql = "SELECT * FROM `message` WHERE `recever`='$role' AND `status`='un_view'";
                        $result_m = $conn->query($sql);
                        $staff_message = $result_m->num_rows;
                    ?>
                        <li class="nav-link"><a href="http://localhost/TMS/view/staff_message.php?"><?php echo htmlspecialchars($lang['message']); ?>
                                <sup style="color: red;"><?php print $staff_message ?></sup></a></li>
                <?php
                    }
                }
                ?>

                <li class="nav-link"><a href="http://localhost/TMS/view/mession.php?"><?php echo htmlspecialchars($lang['mession']); ?></a></li>

                <li class="nav-link"><a href="http://localhost/TMS/view/vision.php?"><?php echo htmlspecialchars($lang['vision']); ?></a></li>

                <li class="nav-link"><a href="http://localhost/TMS/view/rule.php?"><?php echo htmlspecialchars($lang['rule-t']); ?></a></li>
                <li class="nav-link"><a href="http://localhost/TMS/view/notice.php?"><?php echo htmlspecialchars($lang['notice']); ?></a></li>

                <!-- <li class="nav-link"><a href="#"><?php echo htmlspecialchars($lang['about']); ?></a></li> -->

                <li class="nav-link">
                    <a href="http://localhost/TMS/index.php?lang=en">English</a>/
                    <a href="http://localhost/TMS/index.php?lang=it">አማርኛ </a>
                </li>
                <?php
                if (isset($_SESSION['role'])) {
                ?>
                    <li class="nav-link"><a href="http://localhost/TMS/log/logout.php"><?php echo htmlspecialchars($lang['logout']); ?></a></li>
                <?php
                } else {
                ?>
                    <li class="nav-link"><a href="http://localhost/TMS/log/login.php"><?php echo htmlspecialchars($lang['login']); ?></a></li>
                <?php
                }
                ?>

            </div>
        </div>
    </nav>
    <script src="style/js/bootstrap.bundle.min.js"></script>
</body>

</html>