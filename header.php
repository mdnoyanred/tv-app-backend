<?php     
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {

        //header("Location: index.php");
    }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>LiveTV - Katso ilmaisia suoria TV-kanavia</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="media/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/1.8.2/plyr.css">

	<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.0.2/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.0.2/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAXpJ9mNqUzpO_zZaeFqlevXJ8y6QwbCSw",
    authDomain: "finnplace-android.firebaseapp.com",
    databaseURL: "https://finnplace-android.firebaseio.com",
    projectId: "finnplace-android",
    storageBucket: "finnplace-android.appspot.com",
    messagingSenderId: "963601714063",
    appId: "1:963601714063:web:effacec21214f0810a99fa",
    measurementId: "G-QJ198ZN1KN"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
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
				<h1 class="site_title">LiveTV</h1>
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