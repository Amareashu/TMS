<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>left side menu</title>
    </title>
    <style>
        a {
            text-decoration: none;
            color: black;
        }

        .list-group-item {
            padding-left: 15%;
        }
    </style>
</head>

<body>
    <div class="col-lg-3 rounded">
        <ul class="list-group text-left" style="font-family: 'Times New Roman', Times, serif; font-size: 120%;">
            <li class="list-group-item bg-secondary text-light" style="padding-left: 20%;" aria-current="true">
                <h4><?php echo htmlspecialchars($lang['q-menu']); ?></h4>
            </li>
            <a href="http://localhost/TMS/passenger/reserv-tiket.php">
                <li class="list-group-item"><?php echo htmlspecialchars($lang['reserv-tiket']); ?></li>
            </a>
            <?php
            if (!isset($_SESSION['role'])) {
            ?>

            <?php
            }
            if (isset($_SESSION['role'])) {

                $role = $_SESSION['role'];
            ?>
                <a href="http://localhost/TMS/update/change_password.php">
                    <li class="list-group-item"><?php echo htmlspecialchars($lang['reseat-password']); ?></li>
                </a>
                <?php
                if ($role == "Ticket officer") {
                ?>
                    <a href="http://localhost/TMS/Ticket-officer/confirm-re.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['confirm-reservatin']); ?></li>
                    </a>

                    <a href="http://localhost/TMS/Ticket-officer/cancel-re.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['cancel-reservatin']); ?></li>
                    </a>

                    <a href="http://localhost/TMS/Ticket-officer/assign-buss.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['assign-buss']); ?></li>
                    </a>

                    <a href="http://localhost/TMS/Form/send_message.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['send_message']); ?></li>
                    </a>
                <?php
                }
                if ($role == "System admin") {
                ?>
                    <a href="http://localhost/TMS/Form/create_account.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['create-account']); ?></li>
                    </a>

                    <a href="http://localhost/TMS/update/update_account.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['update-account']); ?></li>
                    </a>
                    <a href="http://localhost/TMS/Form/post_notic.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['p-notice']); ?></li>
                    </a>
                    <a href="http://localhost/TMS/Form/send_message.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['send_message']); ?></li>
                    </a>
                <?php
                }
                if ($role == "Manager") {
                ?>
                    <a href="http://localhost/TMS/view/view-pass-data.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['view-pass-data']); ?></li>
                    </a>
                    <a href="http://localhost/TMS/Ticket-officer/change-buss.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['change-buss']); ?></li>
                    </a>
                    <a href="http://localhost/TMS/view/report.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['genrate-repo']); ?></li>
                    </a>
                    <a href="http://localhost/TMS/Form/register-new-buss.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['register-new-bus']); ?></li>
                    </a>
                    <a href="http://localhost/TMS/Form/register-new-jounrny.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['register-new-Journey']); ?></li>
                    </a>
                    <a href="http://localhost/TMS/Form/send_message.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['send_message']); ?></li>
                    </a>
                <?php
                }
                if ($role == "Passenger") {
                ?>
                    <a href="http://localhost/TMS/view/my_reserve.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['my_reserve']); ?></li>
                    </a>
                    <a href="http://localhost/TMS/update/update-tiket.php">
                        <li class="list-group-item"><?php echo htmlspecialchars($lang['update-tiket']); ?></li>
                    </a>

                <?php
                }
            } else {
                ?>
                <a href="http://localhost/TMS/Form/send-comment.php">
                    <li class="list-group-item"><?php echo htmlspecialchars($lang['s-comment']); ?></li>
                </a>
            <?php
            }
            ?>
            <a href="http://localhost/TMS/view/information.php">
                <li class="list-group-item"><?php echo htmlspecialchars($lang['information']); ?></li>
            </a>

            <a href="http://localhost/TMS/index/team.php">
                <li class="list-group-item"><?php echo htmlspecialchars($lang['team']); ?></li>
            </a>

        </ul>
    </div>
</body>

</html>