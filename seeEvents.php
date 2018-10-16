<?php
  session_start();
 ?>

<!DOCTYPE html>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body class="bodySeeEvents">
    <p1 class="eventsHeader">Events</p1>

    <div class="eventsTable">
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = new mysqli($servername, $username, $password, "universitydatabase");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM event WHERE accessibility='PUB'";

        $result = mysqli_query($conn, $sql) or die("bad query");


        echo"<table border='1' width='600px'>";
        echo"<tr><td><B>Name of Event</B></td><td><B>Start time</B></td><td><B>Description</B></td><td><B>Accessibility</B></td></tr>";
        while($row = mysqli_fetch_assoc($result))
        {
          echo"<tr><td>{$row['name']}</td><td>{$row['start_time']}</td><td>{$row['description']}</td><td>{$row['accessibility']}</td></tr>";
        }
        echo"</table>";

      ?>
    </div>

</body>


</html>
