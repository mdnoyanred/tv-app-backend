<?php include "header.php"; ?>
 <?php require('db.php');
	        $query = "select(select count(id) from categories) as total_cat,(select count(id) from channels) as total_channel, (select count(id) from users) as total_users";
	        $rData = $conn->query($query);
	        $data = $rData->fetch_assoc();
	        $total_cat = $data['total_cat'];
	        $total_channel = $data['total_channel'];
			$total_users = $data['total_users'];
	    ?>
<div class="content_main">
	<div class="alert alert-primary"><h1>Kojelauta</h1></div>
	<div class="dashboard_cards">
		<div class="row">
			<div class="col">
				<div class="card" style="width: 16rem;">
				  <div class="card-body" >
				    <h3 class="card-title">Kategoriat</h3>
				    <p class="card-text"><?php echo $total_cat ?></p>
				    <a href="./categories.php" class="btn btn-primary">Näytä kaikki</a>
				  </div>
				</div>
			</div>

			<div class="col">
				<div class="card" style="width: 16rem;">
				  <div class="card-body">
				    <h3 class="card-title">Kanavat</h3>
				    <p class="card-text"><?php echo $total_channel ?></p>
				    <a href="./channels.php" class="btn btn-primary">Näytä kaikki</a>
				  </div>
				</div>
			</div>

			<div class="col">
				<div class="card" style="width: 16rem;">
				  <div class="card-body">
				    <h3 class="card-title">Käyttäjät</h3>
				    <p class="card-text"><?php echo $total_users ?></p>
				    <a href="./user.php" class="btn btn-primary">Näytä tiedot</a>
				  </div>
				</div>
			</div>

			<div class="col">
				<div class="card" style="width: 16rem;">
					<div class="card-body">
					<h3 class="card-title">Kirjaudu ulos</h3>
				    <a href="./logout.php" class="btn btn-primary">Kirjaudu ulos</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php include "footer.php" ?>