<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Small Admin</title>

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
  </style>
</head>

<body style="background: rgb(153, 149, 149);" id="body">
  <?php
  include("../menu.php");
  ?>

  <div class="container-fluid">
    <hr>
    <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;" id="index">

      <div class="col-lg-12 rounded  bg-light body1">

        <div id="about" class="rounded" style="margin-top: 2%; background: rgb(218, 215, 210);">
          <h3 class="text-center rounded">About</h3>
          <h4 style="
          color: black; 
          font-size: 140%; 
          font-weight: bold; 
          font-family: 'Times New roman';">

            The System has the following future's </h4>
          <p>
            Capable of providing better and fast service for users,
          </p>
          <p>
            By reducing transportation cost of applicants or support requesters
          <p>
            By minimize utilization of time for entry that are lost during searching information
          </p>
          <p>
            Capable of providing high data security and reliability to prevent data loss.

          </p>
          <p>
            By decreasing the use of material and manpower of organization.

          </p>
          <p>
            By improving the utilization of organization’s properties.
          </p>
        </div>
        <br>
      </div>
    </div>
  </div>

  <?php include("../footer.php"); ?>
  <script src="../style/js/bootstrap.bundle.min.js"></script>

</body>

</html>