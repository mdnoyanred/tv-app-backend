<?php     

    ob_start();
    if(!isset($_SESSION)) {
        session_start();
    }
// if (! isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off' ) {
//     $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//     header("Location: $redirect_url");
//     exit();
// }
?>


<?php

    if(isset($_SESSION['username']) && isset($_SESSION['password'])) {

        header("Location: dashboard.php");
    }

 ?>


<!DOCTYPE html>
<html lang="fi">
<head>
    <title>Kirjaudu TV App -palvelun hallintapaneeliin</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="media/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.0.2/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.0.2/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAXpJ9mNqUzpO_zZaeFqlevXJ8y6QwbCSw",
    authDomain: "finnplace-android.firebaseapp.com",
    databaseURL: "https://finnplace-android.firebaseio.com",
    projectId: "finnplace-android",
    storageBucket: "finnplace-android.appspot.com",
    messagingSenderId: "963601714063",
    appId: "1:963601714063:web:effacec21214f0810a99fa",
    measurementId: "G-QJ198ZN1KN"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
</head>
<body>

<main class="login-form container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header center">Tervetuloa! Kirjaudu sisään TV App -palvelun hallintapaneeliin.</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Käyttäjänimi</label>
                                <div class="col-md-6">
                                    <input type="text" id="username" class="form-control" name="username" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Salasana</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4 mb-3">
                                <button type="submit" class="btn btn-primary">
                                    Kirjaudu
                                </button>
                            
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
    
</body>
</html>

<?php if(!empty($_POST['username']) && !empty($_POST['password'])){

        $username = $_POST['username'];
        
        require('db.php');


        $sql = "select password,id from users where username='".$username."'";
        $results = $conn->query($sql);

        if($results->num_rows > 0){

            $row = $results->fetch_assoc();

            $hash = $row['password'];
            $password = $_POST['password'];

            if(password_verify($password,$hash)){

                $_SESSION['valid'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = "success";
                $_SESSION['timeout'] = time();
                $_SESSION['userid'] = $row['id'];

                header('Location: dashboard.php');
            }else {
                echo "<script>alert('Väärä salasana.');</script>";
            }

           

        }else {
            echo "
            <script>
                alert('Käyttäjää ei ole olemassa.');
            </script>";
        }

   } ?>