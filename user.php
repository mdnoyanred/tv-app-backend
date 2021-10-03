<?php 
session_start();
include "header.php"; 
include 'db.php';
if(isset($_SESSION['userid'])){
		$query = "select * from users where id=".$_SESSION['userid'];
		$rData = $conn->query($query);
		$data = $rData->fetch_assoc();
	}
?>
<div class="content_main">
    <div class="alert alert-primary">
        <h1>Profiili
            <a href="./api.php?api_key=<?php echo $data["api_key"] ?>&channels=all&user_id=<?php echo $data["id"] ?>"
                target="_blank" rel="noreferrer noopener" style="float: right; text-decoration: none;">
                API
            </a>
        </h1>
    </div>
    <div class="user_profile">
		<div>
			<label>Koko nimi:</label>
			<h5><?php echo $data["name"] ?></h5>
		</div>
		<br>
        <div>
            <label>Käyttäjänimi:</label>
            <h5><?php echo $data["username"]; ?></h5>
        </div>
		<br>
        <div>
            <label>Sähköposti:</label>
            <h5><?php echo $data["email"] ?></h5>
        </div>
		<br>
        <div>
            <label>API-avain:</label>
            <h5><?php echo $data["api_key"]; ?></h5>
        </div>
        <br>
        <div>
            <a href="./settings.php">
                <button class="btn btn-success">Vaihda nimi</button>
                <button class="btn btn-primary">Vaihda käyttäjätunnus</button>
                <button class="btn btn-info">Vaihda salasana</button>
                <button class="btn btn-danger">Vaihda API-avain</button>
            </a>
        </div>
    </div>

    <?php  include "footer.php"; ?>