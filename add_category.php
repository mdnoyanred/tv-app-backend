<?php include "header.php"; ?>


<?php 
	if(isset($_POST['cat_name']) && isset($_POST['cat_image_url'])){
		require_once('db.php');
		$conn->set_charset("utf8"); 
		$query = "insert into categories(name,image_url) values('".$_POST['cat_name']."','".$_POST['cat_image_url']."')";
		if($conn->query($query)){
			echo "<script>alert('Tiedot lisätty.'); location.href = './categories.php';</script>";
		}
	}

?>
 


<div class="content_main">
	<div class="alert alert-primary">
		<h1>Lisää kategoria</h1>
		<div class="add_cat_form">
			<form method="post">
				<input type="text" name="cat_name" placeholder="Kategorian nimi">
				<input type="text" name="cat_image_url" placeholder="Kategorian kuva">
				<input type="submit" name="Lähetä">
			</form>


		</div>
	</div>
</div>
<?php include "footer.php" ?>
