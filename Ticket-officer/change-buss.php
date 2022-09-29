<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>Assign buss</title>
    <style>
        label {
            font-size: 20px;
        }
    </style>
</head>

<body style="background-color: gray;">
    <?php
    include("..//menu.php");
    include("..//connection.php");
    ?>
    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            include("..//r_side_menu.php");
            ?>

            <div class="div2 row col-lg-6 rounded  rounded bg-secondary" id="body">
                <div style="font-family: 'Times New Roman', Times, serif;">
                    <hr>

                    <h3><?php echo htmlspecialchars($lang['change-buss']); ?></h3>
                    <hr>
                    <div class="form-group">
                        <table class="table table-bordered table-sm">

                            <tr style="font-size: 12px; color: black;">
                                <th>#</th>
                                <th><?php echo htmlspecialchars($lang['b/no']); ?></th>
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
                            $li = 1;

                            $result_buss = $conn->query("SELECT * FROM `assign_buss` limit $start_from, $num_per_page");
                            while ($row_buss = $result_buss->fetch_assoc()) {
                                $id = $row_buss['id'];
                                $buss_id = $row_buss['buss_id'];
                                $sourse = $row_buss['source'];
                                $destination = $row_buss['destination'];

                                echo "</tr>
                                     <td>" . $li . "</td>                   
                                     <td>" . $buss_id . "</td>                   
                                            <td>" . $sourse . "</td>                   
                                            <td>" . $destination . "</td>                   
                                            <td> <a href='http://localhost/TMS/Ticket-officer/change_buss_process.php?j_no=$id&p_no=$buss_id'><button class='btn-danger rounded'>";
                                echo htmlspecialchars($lang['update_c']);
                                echo "</button></a> </td> 
                                            </tr>";
                                $li++;
                            }
                            ?>
                            <tr style="text-align: center;">
                                <td colspan="10">

                                    <?php

                                    $pr_query = "SELECT * FROM `assign_buss`";

                                    $pr_result = $conn->query($pr_query);

                                    $total_record = $pr_result->num_rows;

                                    $total_page = ceil($total_record / $num_per_page);

                                    if ($page > 1) {
                                        echo "<a href='http://localhost/TMS/Ticket-officer/change-buss.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
                                    }

                                    for ($i = 1; $i < $total_page; $i++) {
                                        echo "<a href='http://localhost/TMS/Ticket-officer/change-buss.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
                                    }

                                    if ($i > $page) {
                                        echo "<a href='http://localhost/TMS/Ticket-officer/change-buss.php?page=" . ($page + 1) . "' class='btn btn-danger'> Next</a>";
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