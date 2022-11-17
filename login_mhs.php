<?php
session_start(); //inisialisasi session
require_once 'db_connect.php';

//cek apakah user sudah submit form
if (isset($_POST['submit'])) {
    $valid = true; //flag validasi

    //cek validasi email
    $email = $_POST['email'];
    if ($email == '') {
        $error_email = 'Email is required';
        $valid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = 'Invalid email format';
        $valid = false;
    }

    //cek validasi password
    $password = $_POST['password'];
    if ($password == '') {
        $error_password = 'Password is required';
        $valid = false;
    }

    //cek validasi
    if ($valid) {
        //asign a query
        $query =
            " SELECT * FROM mahasiswa WHERE email_mhs='" .
            $email .
            "' AND password_mhs='" .
            $password .
            "' ";
        //excute the query
        $result = $koneksi->query($query);
        if (!$result) {
            die('Could not query the database: <br />' . $koneksi->error);
        } else {
            if ($result->num_rows > 0) {
                //login berhasil
                $_SESSION['username'] = $email;
                header('Location: Mahasiswa/home.php');
                exit();
            } else {
                //login gagal
                echo '<span class="error">Combination of username and password are not correct.</span>';
            }
        }
        //close koneksi connection
        $koneksi->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
body {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

.btn-google {
  color: white !important;
  background-color: #ea4335;
}

.btn-facebook {
  color: white !important;
  background-color: #3b5998;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h1 class="card-title text-center mb-5 fw-light fs-5">Log In Mahasiswa</h1>
            <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars(
                $_SERVER['PHP_SELF']
            ); ?>">
            <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email">
      </div>
      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
              <div class="login-button">
                 <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
            </div>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>