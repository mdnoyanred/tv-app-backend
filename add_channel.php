<?php include "header.php"; ?>


<?php 
	if(isset($_POST['channel_name']) && isset($_POST['channel_description'])){
		require_once('db.php');
		$conn->set_charset("utf8"); 
		if(isset($_GET['edit']))
			$channel_id = $conn->real_escape_string($_GET['edit']);
		$channel_name = $conn->real_escape_string($_POST['channel_name']);
		$channel_description = $conn->real_escape_string($_POST['channel_description']);
		$live_url = $conn->real_escape_string($_POST['live_url']);
		$thumbnail = $conn->real_escape_string($_POST['thumbnail']);
		$facebook = $conn->real_escape_string($_POST['facebook']);
		$twitter = $conn->real_escape_string($_POST['twitter']);
		$instagram = $conn->real_escape_string($_POST['instagram']);
		$youtube = $conn->real_escape_string($_POST['youtube']);
		$website = $conn->real_escape_string($_POST['website']);
		$category = $conn->real_escape_string($_POST['category']);

		if(isset($_GET['edit'])){
			$query = "update channels set name = '".$channel_name."', description = '".$channel_description."', live_url = '".$live_url."', thumbnail = '".$thumbnail."', facebook = '".$facebook."', category='".$category."' , twitter='".$twitter."', instagram='".$instagram."', youtube='".$youtube."', website ='".$website."' where id=".$channel_id."";


		}else {
			$query = "insert into channels(name,description,live_url,thumbnail,facebook,twitter,instagram,youtube,website,category) values('".$channel_name."','".$channel_description."','".$live_url."','".$thumbnail."','".$facebook."','".$twitter."','".$instagram."','".$youtube."','".$website."','".$category."')";
		}

		if($conn->query($query)){
			echo "<script>alert('Tiedot lisätty.'); location.href = './channels.php';</script>";

		}else{
			echo $conn->error;
		}
	}

?>



<div class="content_main">
	<div class="alert alert-primary">
		<?php if (isset($_GET['edit'])){ 
			require 'db.php';
			$id = $conn->real_escape_string($_GET['edit']);
			$query = "select * from channels where id=".$id.";";
			$rawData = $conn->query($query); 
			$data = $rawData->fetch_assoc();

			?>
		<h1>Muokkaa kanavaa</h1>
		<div class="add_question_form">
			<form method="post">
				<label for="channel_name">Kanavan nimi</label>
				<input type="text" name="channel_name" value="<?php echo $data['name']; ?>" plceholder="Kanavan nimi" required>

				<label for="channel_description">Kanavan kuvaus</label>
				<textarea type="text" name="channel_description" required placeholder="Kanavan kuvaus"> <?php echo $data['description']; ?></textarea>

				<label for="live_url">Suora URL-osoite</label>
				<input type="text" name="live_url" placeholder="Suora URL-osoite" value="<?php echo $data['live_url']; ?>">

				<label for="thumbnail">Pikkukuva</label>
				<input type="text" name="thumbnail" placeholder="Pikkukuva" value="<?php echo $data['thumbnail']; ?>">

				<label for="facebook">Facebook</label>
				<input type="text" name="facebook" placeholder="Facebook" value="<?php echo $data['facebook']; ?>">

				<label for="twitter">Twitter</label>
				<input type="text" name="twitter" placeholder="Twitter" value="<?php echo $data['twitter']; ?>">

				<label for="instagram">Instagram</label>
				<input type="text" name="instagram" placeholder="Instagram" value="<?php echo $data['instagram']; ?>">

				<label for="youtube">YouTube</label>
				<input type="text" name="youtube" placeholder="YouTube" value="<?php echo $data['youtube']; ?>">

				<label for="website">Verkkosivusto</label>
				<input type="text" name="website" placeholder="Verkkosivusto" value="<?php echo $data['website']; ?>">

				<label for="category">Kategoria</label>
				<select name="category" required>
					<?php 
						$query = "select * from categories;";
						$rawData = $conn->query($query) or die("Tietojen noutaminen tietokannasta epäonnistui.");
						while($row = $rawData -> fetch_assoc() ) {
							if($data['category'] == $row['name']){
								?> <option selected><?php echo $row['name']; ?></option>  <?php 
							}else {
							?> 
							<option><?php echo $row['name']; ?></option>
				
							<?php 
						}}
					 ?>
				</select>
				<input class="btn btn-primary" type="submit" name="Submit" value="Tallenna">
			</form>
		</div>


		<?php } else { ?>
		<h1>Lisää uusi kanava</h1>
		<div class="add_question_form">
			<form method="post">
				<input type="text" name="channel_name" placeholder="Kanavan nimi" required>
				<textarea type="text" name="channel_description" required placeholder="Kanavan kuvaus">Kanavan kuvaus</textarea>
				<input type="text" name="live_url" placeholder="Suora URL-osoite" required>
				<input type="text" name="thumbnail" placeholder="Pikkukuva" required>
				<input type="text" name="facebook" placeholder="Facebook" >
				<input type="text" name="twitter" placeholder="Twitter" >
				<input type="text" name="instagram" placeholder="Instagram">
				<input type="text" name="youtube" placeholder="YouTube" >
				<input type="text" name="website" placeholder="Verkkosivusto" >
				<select name="category"  required>
					<?php 
					require 'db.php';
						$query = "select * from categories;";
						$rawData = $conn->query($query) or die("Tietojen noutaminen tietokannasta epäonnistui.");
						while($row = $rawData -> fetch_assoc() ) {
							?> 
								<option><?php echo $row['name']; ?></option>
							<?php 
						}
					 ?>
				</select>
				<input class="btn btn-primary" type="submit" name="Lähetä">
			</form>
		</div>
		 <?php } ?>
	</div>
</div>
<?php include "footer.php" ?>