<?php
    require('db.php');
    require('auth.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollegeEventWebsite</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search1.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color:#f8f8ff;">


<?php

    if(        isset($_REQUEST['rso_name'])
            && isset($_REQUEST['university'])
            && isset($_REQUEST['rso_description'])
            && isset($_REQUEST['email_one'])

            && !empty($_REQUEST['rso_name'])
            && !empty($_REQUEST['rso_description'])
            && !empty($_REQUEST['university'])
            && !empty($_REQUEST['email_one'])
            && !empty($_REQUEST['email_two'])
            && !empty($_REQUEST['email_three'])
            && !empty($_REQUEST['email_four'])
            && !empty($_REQUEST['email_five'])
            )

        {

            $rso_name = $_REQUEST['rso_name'];
            $rso_description = $_REQUEST['rso_description'];
            $created_by = $_REQUEST['email_one'];
            $university = $_REQUEST['university'];

            $query= "INSERT INTO rso (name_of_RSO, description, admin, university)
                    VALUES ('$rso_name','$rso_description','$created_by', $university)";

            if (mysqli_query($con, $query) === TRUE) {
                $result = 'New record created successfully';
            } else {
                $result = 'Error inserting';
            }

            echo($result);
        }

?>


    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">College Events</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="ucfhome.php" style="background-image:url(&quot;none&quot;);background-color:transparent;color:rgb(51, 51, 51);background-repeat:repeat;">Home </a></li>
                    <li role="presentation"><a href="rsos.php">RSOs </a></li>
                    <li role="presentation"><a href="eventsearch.php">Events </a></li>
                    <li role="presentation"><a href="logout.php">Logout </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div>
            <form>
                <h1>Enter 5 emails at an approved university domain</h1>

                <div class="form-group">
                    <label class="control-label">RSO Name</label>
                    <input class="form-control" type="text" name="rso_name">
                </div>

                <div class="form-group">
                    <label class="control-label">University</label>
                    <input class="form-control" type="text" name="university">
                </div>

                <div class="form-group">
                    <label class="control-label">RSO description (max 140 characters)</label>
                    <input class="form-control" type="text" name="rso_description">
                </div>

                <label>The first email will be chosen as the RSO admin</label>
                <div class="form-group">
                    <input class="form-control" type="email" name="email_one" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email_two" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email_three" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email_four" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email_five" placeholder="Email">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" style="background-color:#5f9ea0;background-image:url(&quot;none&quot;);">Register </button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
