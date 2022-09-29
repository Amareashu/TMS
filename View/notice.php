<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
  <link rel="stylesheet" href="..//style/css/style.css">
  <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
  <title> notice</title>
  <style>
    table {
      font-family: 'times new roman';
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
        <div class="form-group" style="padding-left:5%;">
          <div class="form-group">
            <hr>
            <h3 class="text-center rounded"><?php echo htmlspecialchars($lang['notice']); ?></h3>
            <hr>
          </div>
          <div class="col-md-10">
            <div class="form-group mt-3">
              <?php
              include("../connection.php");
              $li = 1;

              $sql = "SELECT * FROM `notice` ORDER BY `notice`.`date` DESC";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

                // output data of each row
                echo "<table class='table align-middle'>
                <tr><th>#</th>";
              ?>
                <th><?php echo htmlspecialchars($lang['subject']); ?></th>
                <th><?php echo htmlspecialchars($lang['message']); ?></th>
                <th><?php echo htmlspecialchars($lang['s-date']); ?></th>
                <th><?php echo htmlspecialchars($lang['action']); ?></th>

              <?php echo " </tr>";
                while ($row = $result->fetch_assoc()) {
                  $c_id = $row["id"];
                  //subject`, `message`, `date
                  echo "
                    <tr>
                        <td>$li</td> 
                        <td>" . $row["subject"] . "</td>
                        <td>" . $row["message"] . "</td>  
                        <td>" . $row["date"] . "</td>                                                            
                        <td>
                        <a href='http://localhost/TMS/View/notice_detile.php?c_id=$c_id'>
                        <button class='btn-success rounded'>" . htmlspecialchars($lang['view']) . " </button></a>";
                  if (isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == "System admin") {
                      echo " <a href='http://localhost/TMS/delete/delete_notice.php?c_id=$c_id'>
                        <button class='btn-danger rounded'>" . htmlspecialchars($lang['delete']) . " </button></a> ";
                    }
                  }
                  echo "   </td>
                    </tr>";
                  $li++;
                }
                echo "</table>";
              } else {
                echo "0 results";
              }

              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 rounded  rounded bg-secondary">
        <?php
        include '../timecalendar.php';
        ?>
      </div>
    </div>
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
    <?php include("..//footer.php"); ?>
</body>

</html>