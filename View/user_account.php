<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
  <link rel="stylesheet" href="..//style/css/style.css">
  <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
  <title>Account List</title>
  <style>
    table {
      font-family: 'times new roman';
    }

    .btn {
      font-family: 'Times New Roman', Times, serif;
      height: 30px;
    }
  </style>
</head>

<?php include("..//connection.php") ?>

<body style="background-color: gray;">
  <?php
  include("..//menu.php");
  include("..//login_check.php");
  ?>
  <div class="container-fluid">
    <hr>
    <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

      <?php
      include("..//r_side_menu.php")
      ?>
      <div class="col-lg-9 bg-light rounded">
        <hr>
        <h3 class="rounded" style="
        background-color: rgb(56, 52, 52); 
        text-align: center; 
        color: wheat;
        font-family: 'Times New Roman';">
          Account List's </h3>
        <hr>
        <a href="http://localhost/HSRS/Form/create_account.php#">
          <button style="font-family: 'Times New Roman', Times, serif;" id="report" class="rounded btn-info">Create New Account </button>
        </a>
        <hr>
        <?php
        include("../connection.php");
        $li = 1;

        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $num_per_page = 4;
        $start_from = ($page - 1) * 3;

        $sql = "SELECT * FROM `account` limit $start_from,$num_per_page";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          echo "<table class='table align-middle'>
                <tr>
                    <th>#</th> 
                    <th>Full Name</th> 
                    <th>Role</th>    
                    <th>User Name</th>        
                    <th>Password</th>         
                    <th>Status</th>         
                    <th>Action</th>                    
                </tr>";
          while ($row = $result->fetch_assoc()) {

            $uname = $row["id"];
            $user_id = $row["user_id"];
            $btn = $row["status"];

            $user_acc = "SELECT * FROM `student`   WHERE `id`='$user_id'";
            $user_acc_result = $conn->query($user_acc);
            if ($user_acc_result->num_rows > 0) {
              while ($user_acc = $user_acc_result->fetch_assoc()) {
                echo "<tr> <td>$li</td> 
                <td>" . $user_acc["f_name"] . " " . $user_acc["m_name"] . " " . $user_acc["l_name"] . "</td> 
                    <td>" . $row["role"] . "</td>  
                    <td>" . $row["username"] . "</td>
                    <td>" . base64_decode($row["password"]) . "</td>                   
                    <td>" . $row["status"] . "</td>                   
                    <td>                        
                        <a href='http://localhost/HSRS/update/update_account.php?uname=$uname'>
                        <button class='btn-primary rounded'>Update</button>
                        </a>";
                if ($btn == "Active") {
                  echo "<a href='http://localhost/HSRS/update/de_activate_account.php?uname=$uname&action=$btn'>
              <button class='btn-success rounded'>Deactivate</button></a></td>";
                } else {
                  echo "<a href='http://localhost/HSRS/update/de_activate_account.php?uname=$stud_id&action=$btn'>
                  <button class='btn-danger rounded'>Activate</button></a></td>";
                }
                echo   "</tr>";
                $li++;
              }
            }
            $user_acc = "SELECT * FROM `teacher`   WHERE `id`='$user_id'";

            $user_acc_result = $conn->query($user_acc);
            if ($user_acc_result->num_rows > 0) {
              while ($user_acc = $user_acc_result->fetch_assoc()) {
                echo "<tr> <td>$li</td> 
                <td>" . $user_acc["f_name"] . " " . $user_acc["m_name"] . " " . $user_acc["l_name"] . "</td> 
                    <td>" . $row["role"] . "</td>  
                    <td>" . $row["username"] . "</td>
                    <td>" . base64_decode($row["password"]) . "</td>                   
                    <td>" . $row["status"] . "</td>                   
                    <td>                        
                        <a href='http://localhost/HSRS/update/update_account.php?uname=$uname'>
                        <button class='btn-primary rounded'>Update</button>
                        </a>";
                if ($btn == "Active") {
                  echo "<a href='http://localhost/HSRS/update/de_activate_account.php?uname=$uname&action=$btn'>
              <button class='btn-success rounded'>Deactivate</button></a></td>";
                } else {
                  echo "<a href='http://localhost/HSRS/update/de_activate_account.php?uname=$uname&action=$btn'>
                  <button class='btn-danger rounded'>Activate</button></a></td>";
                }
                echo   "</tr>";
                $li++;
              }
            }
          }
          echo "</table>";
        } else {
          echo "0 results";
        }
        $pr_query = "SELECT * FROM `account`";
        $pr_result = $conn->query($pr_query);

        $total_record = $pr_result->num_rows;

        $total_page = ceil($total_record / $num_per_page);
        ?>
        <div class="text-center col=md 12">
          <?php
          if ($page > 1) {
            echo "<a href='http://localhost/HSRS/View/user_account.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
          }

          for ($i = 1; $i < $total_page; $i++) {
            echo "<a href='http://localhost/HSRS/View/user_account.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
          }

          if ($i > $page) {
            echo "<a href='http://localhost/HSRS/View/user_account.php?page=" . ($page + 1) . "' class='btn btn-danger'> Next</a>";
          }
          ?>
          <hr>
        </div>
      </div>
    </div>
  </div>
  <script src="..//style/js/bootstrap.bundle.min.js"></script>
  <?php include("..//footer.php"); ?>
</body>

</html>