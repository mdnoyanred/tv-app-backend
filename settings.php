<?php 
session_start();
include "header.php"; ?>
<?php require('db.php');
	if(isset($_SESSION['userid'])){
		$query = "select * from users where id=".$_SESSION['userid'];
		$rData = $conn->query($query);
		$data = $rData->fetch_assoc();
	}
?>

<?php 
	if(isset($_POST['api_key'])){
		if($_POST['api_key'] != $data['api_key']){
			$query = "update users set api_key='".$conn->real_escape_string($_POST['api_key'])."' where id=".$_SESSION['userid'];
			if($conn->query($query)){
				echo "<script>alert('Uusi API-avain tallennettu.');location.reload();</script>";
			}else {
				echo "<script>alert('Virhe tallennettaessa.');</script>";
			}
		}
	}

	if(isset($_POST['email']) && isset($_POST['newEmail'])){
		if($_POST['email'] == $data['email']){

			$newEmail = $_POST['newEmail'];

			$check = "SELECT * FROM users WHERE email='".$newEmail."'";
		    $results = $conn->query($check);

		    if($results->num_rows > 0){
		         echo "<script>alert('Sähköposti on jo olemassa.');</script>";  
		    }else {

		        $sql = "update users set email='".$newEmail."'";
		        if($conn->query($sql) === true){
		            echo "<script>alert('Sähköposti päivitetty.');</script>" ;
		        }else {
		            echo $sql." -> ".$conn->error;
		      }
		}
	}else {
		echo "<script>alert('Sähköpostia ei löydy.');</script>" ;
	}
}

	if(isset($_POST['username']) && isset($_POST['newUsername'])){
		if($_POST['username'] == $data['username']){

			$newUsername = $_POST['newUsername'];

			$check = "SELECT * FROM users WHERE username='".$newUsername."'";
		    $results = $conn->query($check);

		    if($results->num_rows > 0){
		         echo "<script>alert('Käyttäjätunnus on jo olemassa.');</script>";  
		    }else {

		        $sql = "update users set username='".$newUsername."'";
		        if($conn->query($sql) === true){
		            echo "<script>alert('Käyttäjätunnus päivitetty.');</script>" ;
		        }else {
		            echo $sql." -> ".$conn->error;
		      }
		}
	}else {
		echo "<script>alert('Käyttäjätunnusta ei löydy.');</script>" ;
	}
}

if(isset($_POST['oldPassword']) && isset($_POST['newPassword'])){

		$hash = $data['password'];
		$oldpassword = $_POST['oldPassword']; 
		$newPassword = $_POST['newPassword'];

		if(password_verify($oldpassword,$hash)){

			$newPasswordHash = password_hash($newPassword,PASSWORD_DEFAULT);

			$sql = "update users set password='".$newPasswordHash."'";
			 if($conn->query($sql) === true){
		            echo "<script>alert('Salasana päivitetty.');</script>" ;
		        }else {
		            echo $sql." -> ".$conn->error;
		      }

		}else {
			echo "<script>alert('Salasana ei täsmää.');</script>" ;
		}	
}

?>
<div class="content_main">
    <div class="alert alert-primary">
        <h1>Asetukset</h1>
    </div>
    <form class="settings_form" method="post">
        <label>API-avain:</label>
        <input type="text" name="api_key" id="api" placeholder="API-avain" value="<?php echo $data['api_key'] ?>"
            required>
        <input class="btn btn-primary" type="button" name="api_key_btn" onclick="generateKey()" value="Luo uusi avain">
        <label id="usernameLabel"></label>
        <input class="btn btn-primary" type="submit" name="submit" value="Tallenna">
    </form>
    <br>
    <form class="settings_form" method="post">
        <label>Vaihda sähköposti:</label>
        <input type="email" name="email" placeholder="Vanha sähköposti" required>
        <input type="email" name="newEmail" placeholder="Uusi sähköposti" required>
        <label></label>
        <input class="btn btn-primary" type="submit" name="submit" value="Tallenna">
    </form>
    <br>
    <form class="settings_form" method="post">
        <label>Vaihda käyttäjätunnus:</label>
        <input type="text" name="username" placeholder="Vanha käyttäjätunnus" required>
        <input type="text" name="newUsername" placeholder="Uusi käyttäjätunnus" required>
        <label></label>
        <input class="btn btn-primary" type="submit" name="submit" value="Tallenna">
    </form>
    <br>
    <form class="settings_form" method="post">
        <label>Vaihda salasana: </label>
        <input type="password" name="oldPassword" placeholder="Vanha salasana" required>
        <input type="password" name="newPassword" placeholder="Uusi salasana" required>
        <label></label>
        <input class="btn btn-primary" type="submit" name="submit" value="Tallenna">
    </form>

    <script type="text/javascript">
    function randomstring(L) {
        var s = '';
        var randomchar = function() {
            var n = Math.floor(Math.random() * 62);
            if (n < 10) return n; //1-10
            if (n < 36) return String.fromCharCode(n + 55); //A-Z
            return String.fromCharCode(n + 61); //a-z
        }
        while (s.length < L) s += randomchar();
        return s;
    }

    function generateKey() {
        var input = document.getElementById("api");
        input.value = randomstring(20);
    }
    </script>
</div>