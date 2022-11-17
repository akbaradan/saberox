<!--Hey! This is the original version
of Simple CSS Waves-->
<?php
session_start(); //inisialisasi session
require_once 'db_connect.php';

//cek apakah user sudah submit form
if (isset($_POST['submit'])) {
    $valid = true; //flag validasi

    //cek validasi email
    $email = test_input($_POST['email']);
    if ($email == '') {
        $error_email = 'Email is required';
        $valid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = 'Invalid email format';
        $valid = false;
    }

    //cek validasi password
    $password = test_input($_POST['password']);
    if ($password == '') {
        $error_password = 'Password is required';
        $valid = false;
    }

    //cek validasi
    if ($valid) {
        //asign a query
        $query =
            " SELECT * FROM user WHERE email='" .
            $email .
            "' AND password='" .
            $password .
            "' ";
        //excute the query
        $result = $koneksi->query($query);
        if (!$result) {
            die('Could not query the database: <br />' . $db->error);
        } elseif (
            $query = " SELECT * FROM user WHERE role='" . $result->role . "' "
        ) {
            if ($result->num_rows > 0) {
                //login berhasil
                $_SESSION['username'] = $email;
                header('Location: operator.php');
                exit();
            } else {
                //login gagal
                echo '<span class="error">Combination of username and password are not correct.</span>';
            }
        }
        //close db connection
        $koneksi->close();
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAA SIAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<div class="header">
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:300:400);

        .header {
            position: relative;
            text-align: center;
            background: linear-gradient(60deg, rgba(205, 252, 246, 1) 0%, rgba(152, 168, 248, 1) 100%);
            color: green;
        }

        body {
            margin: 0px;
        }

        .inner-header {
            height: 65vh;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .flex {
            /*Flexbox for containers*/
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .waves {
            position: relative;
            width: 100%;
            height: 15vh;
            margin-bottom: -7px;
            /*Fix for safari gap*/
            min-height: 100px;
            max-height: 150px;
        }

        .content {
            position: relative;
            height: 20vh;
            text-align: center;
            background-color: blue;
        }

        /* Animation */

        .parallax>use {
            animation: move-forever 25s cubic-bezier(.55, .5, .45, .5) infinite;
        }

        .parallax>use:nth-child(1) {
            animation-delay: -2s;
            animation-duration: 7s;
        }

        .parallax>use:nth-child(2) {
            animation-delay: -3s;
            animation-duration: 10s;
        }

        .parallax>use:nth-child(3) {
            animation-delay: -4s;
            animation-duration: 13s;
        }

        .parallax>use:nth-child(4) {
            animation-delay: -5s;
            animation-duration: 20s;
        }

        @keyframes move-forever {
            0% {
                transform: translate3d(-90px, 0, 0);
            }

            100% {
                transform: translate3d(85px, 0, 0);
            }
        }

        /*Shrinking for mobile*/
        @media (max-width: 768px) {
            .waves {
                height: 40px;
                min-height: 40px;
            }

            .content {
                height: 30vh;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
    <!--Content before waves-->
    <div class="box d-flex ms-auto align-items-center justify-content-center text-center py-3">
        <form action="cek_login.php" method="POST">
            <div class="logo mx-auto mb-2">
                <img src="logoundip.png" width="250px" alt="">
            </div>
            <div class="logo mx-auto mb-2">
                <img id="logoo" src="./img/logo.png" alt="">
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="login-button">
                <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
            </div>
        </form>
    </div>

    <!--Waves Container-->
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
    <!--Waves end-->

</div>
<!--Header ends-->

<!--Content starts-->

<!--Content ends-->