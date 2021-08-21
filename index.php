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
    <title>Login to LiveTV Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="media/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

<main class="login-form container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header center">Tervetuloa! Kirjaudu sisään LiveTV:n hallintapaneeliin.</div>
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