<?php     
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {

        //header("Location: index.php");
    }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>TV App - Hallintapaneeli</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="media/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/1.8.2/plyr.css">
</head>
<body>
<?php
	require('db.php');
	if(isset($_SESSION['userid'])){
		$query = "select * from users where id=".$_SESSION['userid'];
		$rData = $conn->query($query);
		$data = $rData->fetch_assoc();
	}
?>

	<div class="main_wrapper container">
		<header class="site_branding">
			<div class="brand_wrapper">
				<div class="brand">
					<a href="./dashboard.php">
					<img
						src="media/tvapp_logo_web.png"
						alt="TV App logo"
						width="150px"
						height="80px"
						style="margin: 1.5em;"
					>
					</a>
				</div>
			</div>
		</header>

		<div class="site_content">
			<div class="side_menu_bar">
				<nav class="side_menu_nav">
					<a href="./dashboard.php">Koti</a>
					<a href="./categories.php">Kategoriat</a>
					<a href="./channels.php">Kanavat</a>
					<a href="./user.php">Käyttäjät</a>
					<a href="./settings.php">Asetukset</a>
					<a href="./logout.php">Kirjaudu ulos</a>
				</nav>
			</div>