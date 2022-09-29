<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>Confirm R</title>
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
            include("..//r_side_menu.php");
            $li = 1;
            ?>

            <div class="div2 row col-lg-6 rounded  rounded bg-secondary" id="body" style="font-family: 'Times New Roman', Times, serif;">

                <div class="form-group">
                    <hr>
                    <h3 class="text-center rounded"><?php echo htmlspecialchars($lang['cancel-reservatin']); ?></h3>
                    <hr>
                    <div class="input-group mb-3 table-responsive">
                        <table class="table table-bordered table-sm">

                            <tr style="font-size: 12px; color: black;">
                                <th>#</th>
                                <th><?php echo htmlspecialchars($lang['b/no']); ?></th>
                                <th><?php echo htmlspecialchars($lang['full-name']); ?></th>
                                <th><?php echo htmlspecialchars($lang['phone']); ?></th>
                                <th><?php echo htmlspecialchars($lang['date']); ?></th>
                                <th><?php echo htmlspecialchars($lang['sourse']); ?></th>
                                <th><?php echo htmlspecialchars($lang['desti']); ?></th>
                                <th><?php echo htmlspecialchars($lang['action']); ?></th>
                            </tr>

                            <?php

                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            $num_per_page = 4;
                            $start_from = ($page - 1) * 4;

                            $x = 0;

                            $result = $conn->query("SELECT * FROM `reserved_journey` WHERE `status`='Confirmed' limit $start_from, $num_per_page");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row["id"];
                                    $buss_id = $row["buss_id"];

                                    $result_buss = $conn->query("SELECT * FROM `assign_buss` WHERE `buss_id`='$buss_id'");
                                    while ($row_buss = $result_buss->fetch_assoc()) {
                                        $sourse = $row_buss['source'];
                                        $destination = $row_buss['destination'];
                                    }
                                    echo "<tr> <td>$li</td> 
                                        <td>" . $row["buss_id"] . "</td> 
                                            <td>" . $row["full-name"] . "</td>  
                                            <td>" . $row["phone"] . "</td>
                                            <td>" . $row["journey_date"] . "</td>                   
                                            <td>" . $sourse . "</td>                   
                                            <td>" . $destination . "</td>                   
                                            <td> <a href='http://localhost/TMS/process/reserv-cancel.php?r_no=$id'><button class='btn-danger rounded'>"; echo htmlspecialchars($lang['cancel_l']);  echo "</button></a> </td> 
                                            </tr>";
                                    $li++;
                                }
                            }
                            ?>
                            <tr style="text-align: center;">
                                <td colspan="10">

                                    <?php

                                    $pr_query = "SELECT * FROM `reserved_journey` WHERE `status`='Confirmed'";

                                    $pr_result = $conn->query($pr_query);

                                    $total_record = $pr_result->num_rows;

                                    $total_page = ceil($total_record / $num_per_page);

                                    if ($page > 1) {
                                        echo "<a href='http://localhost/TMS/Ticket-officer/cancel-re.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
                                    }

                                    for ($i = 1; $i < $total_page; $i++) {
                                        echo "<a href='http://localhost/TMS/Ticket-officer/cancel-re.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
                                    }

                                    if ($i > $page) {
                                        echo "<a href='http://localhost/TMS/Ticket-officer/cancel-re.php?page=" . ($page + 1) . "' class='btn btn-danger'> Next</a>";
                                    }
                                    
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
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