<?php include "header.php"; ?>
<div class="content_main">
	<div class="alert alert-primary">
		<h1>Kaikki kanavat <a style="float: right;" href="./add_channel.php">+</a></h1>
	</div>
	<div class="cat_cards">
		<div class="row">
			<?php
				require 'db.php';
				$conn->set_charset("utf8"); 
				$query = "select * from channels order by id asc;";
				$raw = $conn->query($query);
				while($row = $raw->fetch_assoc()){ ?>
					<div class="col">
						<div class="card" >
							<a href="./play.php?live_url=<?php echo $row["live_url"] ?>">
								<img
									class="card-img-top"
									src="<?php echo $row['thumbnail'] ?>"
									alt="Card image cap"
									style="padding: .4em;"
								>
							</a>
							<div class="card-body">
								<h5 class="card-title"><?php echo $row['name']; ?></h5>
								<p style="display: flex;">
									<a class="btn btn-primary" href="./play.php?live_url=<?php echo $row['live_url']; ?>">Toista</a> 
									<a class="btn btn-danger" href="./delete_channel.php?id=<?php echo $row['id']; ?>">Poista</a> 
									<a class="btn btn-info" href="./add_channel.php?edit=<?php echo $row['id']; ?>">Muokkaa</a>
								</p>
							</div>
						</div>
					</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php include "footer.php" ?>