<?php include "header.php"; ?>
<div class="content_main">
	<div class="alert alert-primary"><h1> Kategoria: <?php echo $_GET['category']; ?></h1></div>
	<?php
		require 'db.php';
		$conn->set_charset("utf8");  
		$cat = $conn->real_escape_string($_GET['category']);
		$query = "select * from channels where category='".$cat."';";
		$raw = $conn->query($query);
		//echo $raw->fetch_assoc() > 0;
		if($raw->fetch_assoc() > 0){
			$raw->data_seek(0);
			while($row = $raw->fetch_assoc()){ ?>
				<div class="alert alert-warning q_title"><?php echo $row['name']; ?> <a style="float:right;" href="./add_question.php?edit=<?php echo $row['id']; ?>"> Muokkaa</a></div>

				
		<?php }
		}else {
			echo "<h5>Mitään ei löytynyt</h5>";
			
		}

	?>
</div>
<?php include "footer.php" ?>