<?php 
    if(isset($_GET['id'])){
        require_once('db.php');
        
        $query = "delete from channels where id=".$_GET['id'];
        if($conn->query($query)){
			echo "<script>alert('Rivi poistettu.'); location.href = 'channels.php';</script>";
			

		}else{
			echo $conn->error;
		}
    }

?>