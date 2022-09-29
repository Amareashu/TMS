<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Team</title>

  <link rel="stylesheet" href="../style/css/bootstrap.min.css">
  <script type="text/javascript" src="../style/JS/jquery-1.4.2.min.js"></script>
  <link rel="stylesheet" href="../style/css/style.css">
  <script type="text/javascript" src="../style/JS/jquery.validate.js"></script>
  <style>
    #index h3 {
      font-family: 'Times New Roman';
      font-weight: bold;
      font-size: 140%;
      background-color: rgb(56, 52, 52);
    }

    p {
      font-family: 'Times New Roman', Times, serif;
      font-size: 125%;
      color: black;
      margin-left: 3%;
    }

    p {
      margin-left: 4%;
    }

    h4 {
      margin-left: 3%;
      margin-top: 2%;
    }

    .clearfix {
      overflow: auto;
      padding: 5px;
      margin: 1%;
      color: black;
      font-family: 'Times New Roman', Times, serif;
      font-size: 120%;
    }

    #img2 {
      float: left;
      width: 100%;
      margin-bottom: 4%;
    }
  </style>
</head>

<body style="background: rgb(153, 149, 149);" id="body">
  <?php
  include("../menu.php");
  ?>

  <div class="container-fluid">

    <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;" id="index">
      <hr>
      <?php
      include("..//r_side_menu.php");
      ?>

      <div class="div2 row col-lg-6 rounded  rounded bg-secondary" id="body">
        <hr>
        <h3 class="text-center rounded"><?php echo htmlspecialchars($lang['team']); ?> </h3>
        <h4 style="
          color: black; 
          font-size: 110%; 
          font-weight: bold; 
          font-family: 'Times New roman'; text-align: center;">
          <?php echo htmlspecialchars($lang['team_d']); ?>
          <hr style="width: 97%; font-weight: bold;">
        </h4>

        <div class="row clearfix">
          <div class="col-lg-4">

            <img src="http://localhost/tms/img/f.jpg" style="width: 70%; height: 160px; border-radius: 10%;" alt="nott">

            <br>
            <b>
              <?php echo htmlspecialchars($lang['g_name']); ?> :
              <?php echo htmlspecialchars($lang['f']); ?> </b><br>
            <b> <?php echo htmlspecialchars($lang['g_id']); ?> :</b> BDU1105969 <br>
            <b><?php echo htmlspecialchars($lang['g_phone']); ?> :</b> 0921069950 <br>
            <b><?php echo htmlspecialchars($lang['g_email']); ?> :</b> fikrun@gmail.com
            <hr>
          </div>

          <div class="col-lg-4">
            <img src="http://localhost/tms/img/h.jpg" style="width: 70%; height: 160px;  border-radius: 10%;" alt="nott">

            <br>
            <b>
            <?php echo htmlspecialchars($lang['g_name']); ?> :
            <?php echo htmlspecialchars($lang['h']); ?> </b><br>
            <b> <?php echo htmlspecialchars($lang['g_id']); ?> : </b> BDU1106021 <br>
            <b><?php echo htmlspecialchars($lang['g_phone']); ?> : </b> 0919099962 <br>
            <b><?php echo htmlspecialchars($lang['g_email']); ?> :</b> haile@gmail.com

            <hr>
          </div>

          <div class="col-lg-4">

            <img src="http://localhost/tms/img/m.jpg" style="width: 70%; height: 160px;  border-radius: 10%;" alt="nott">
            <br><b>
            <?php echo htmlspecialchars($lang['g_name']); ?> :
            <?php echo htmlspecialchars($lang['m']); ?> </b><br>
            <b> <?php echo htmlspecialchars($lang['g_id']); ?> :</b> BDU1105816 <br>
            <b><?php echo htmlspecialchars($lang['g_phone']); ?> :</b> 0919032287 <br>
            <b><?php echo htmlspecialchars($lang['g_email']); ?> : </b>mam@gmail.com

            <hr>
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
  </div>

  <?php include("../footer.php"); ?>
  <script src="../style/js/bootstrap.bundle.min.js"></script>

</body>

</html>