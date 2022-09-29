<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TMS</title>

    <link rel="stylesheet" href="../style/css/bootstrap.min.css">
    <script type="text/javascript" src="../style/JS/jquery-1.4.2.min.js"></script>
    <link rel="stylesheet" href="../style/css/style.css">
    <script type="text/javascript" src="../style/JS/jquery.validate.js"></script>
    <style>
        #contact {
            padding: 5%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
            background-color: #fff;
            margin-left: 10%;
            margin-right: 10%;
            margin-top: 2%;
            margin-bottom: 2%;
            width: 80%;
        }

        label {
            font-family: 'Times New Roman';
            font-weight: bold;
            font-size: 120%;
            color: black;
        }
    </style>
</head>

<body style="background: rgb(153, 149, 149);" id="body">
    <?php
    include("../connection.php");
    include("../menu.php");
    $info = "";
    ?>

    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;" id="index">
            <div class="col-lg-12 rounded bg-secondary body1" style="color: white;">

                <form class="form-horizontal" method="post">
                    <div class="row col-md-5 rounded" id="contact">
                        <fieldset style="margin-left: 10%;">
                            <div class="col-md-8">
                                <h3 class="text-center rounded">Contact</h3>

                                <?php
                                if (isset($_POST['send'])) {
                                    $sender = $_POST['email'];
                                    $message = $_POST['message'];
                                    $date = date("d-m-y");
                                    //`id`, `sender`, `message`, `date`
                                    if (!empty($message)) {
                                        if ($conn->query("INSERT INTO feedback(`sender`, `message`, `date`) 
                                    VALUES ('$sender','$message','$date')")) {
                                            $info = "<i style='color: green'>Your message is successfuly sent</i>";
                                        } else {
                                            print "some error occured " . $conn->error;
                                        }
                                    } else {
                                        $info = "Sorry ! The Message Area is Empity";
                                    }
                                }
                                print "$info";
                                ?>
                                <hr>
                            </div>

                            <!-- Email input-->
                            <div class="mb-3">
                                <label class="col-md-4 control-label" for="email">Your E-mail</label>
                                <div class="col-md-8">
                                    <input name="email" type="email" placeholder="Your email" class="form-control" required>
                                </div>
                            </div>

                            <!-- Message body -->
                            <div class="mb-3">
                                <label class="col-md-3 control-label">Your message</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="mb-3">
                                <div class="col-md-8">
                                    <button type="submit" name="send" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                </form>


            </div>
        </div>
    </div>


    <!--
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid"> 
            <a href="#" class="navbar-brand">Markt Supporive System1</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-link">Home</li>
                <li class="nav-link">About</li>
                <li class="nav-link">Service</li>
                <li class="nav-link">Healp</li>
                <li class="nav-link">Contact</li>
            </ul>
            <form action="">
                <input type="text" placeholder="Search..." class="form-control"> 
            </form>
        </div>
    </nav>

    <nav class="navbar navbar-dark bg-dark mt-4">
        <div class="container-fluid"> 
            <a href="#" class="navbar-brand">Markt Supporive System3</a>
            <button type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu1" class="navbar-toggler"> 
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-menu1">
                <ul class="navbar-nav">
                    <li class="nav-link">Home</li>
                    <li class="nav-link">About</li>
                    <li class="nav-link">Service</li>
                    <li class="nav-link">Healp</li>
                    <li class="nav-link">Contact</li>
                </ul>
                <form action="">
                    <input type="text" placeholder="Search..." class="form-control"> 
                </form>
            </div>
        </div>
    </nav>
-->
    <?php include("../footer.php"); ?>
    <script src="../style/js/bootstrap.bundle.min.js"></script>

</body>

</html>