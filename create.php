<?php 
    
    require_once('db.php');
    $first = "Bikash";
    $last = "Thapa";
    $email = "admin@smallacademy.co";
    $hash = password_hash("$#@_Admin",PASSWORD_DEFAULT);
    $check = "SELECT * FROM users WHERE username='".$email."'";
    $results = $conn->query($check);

    if($results->num_rows > 0){
         echo "Käyttäjänimi on jo varattu...";  
    }else {

        $sql = "INSERT INTO users(username,password) VALUES('".$email."','".$hash."')";
        if($conn->query($sql) === true){
            echo "Uusi käyttäjä luotu." ;
            header('Location: ./index.php');
        }else {
            echo $sql." -> ".$conn->error;
      }

    }
?>