<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	session_start();

	if (!isset($_SESSION['email'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['email']);
		header("location: login.php");
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success">
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['email'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>

	<div class="events">
		<button id="seeEvents"> See Events </button>
		<script type="text/javascript">
    document.getElementById("seeEvents").onclick = function () {
        location.href = "seeEvents.php";
    };
		</script>

		<button id="createRSO"> Create RSO </button>
		<script type="text/javascript">
		document.getElementById("createRSO").onclick = function () {
				location.href = "createRSO.php";
		};
		</script>

		<button id="createEvent"> Create Event </button>
		<script type="text/javascript">
		document.getElementById("createEvent").onclick = function () {
				location.href = "createEvent.php";
		};
		</script>
	</div>

</body>
</html>
