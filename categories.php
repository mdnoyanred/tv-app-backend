<?php include "header.php"; ?>
<div class="content_main">
	<div class="alert alert-primary"><h1>Kaikki kategoriat <a style="float: right;" href="./add_category.php">+</a></h1> </div>
	<div class="cat_cards">
		<div class="row">
			<?php 
				require 'db.php';

				$query = "select * from categories order by id asc;";
				$rawData = $conn->query($query) or die("<script>alert('Tietoja ei voi hakea tietokannasta.')");
				while($row = $rawData -> fetch_assoc()){ ?>

					<div class="col">
						<div class="card" style="width: 16rem;">
						  <img class="card-img-top" src="<?php echo $row['image_url'] ?>" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title"><a href="./view.php?category=<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a></h5>
						  </div>
						</div>
					</div>
				
				<?php } ?>
		</div>
	</div>
</div>
<?php include "footer.php" ?>