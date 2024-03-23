<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamui Gallery</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #233A66;
            font-family: 'Poppins', sans-serif;
        }
        .jumbotron {
            background-image: url('images/wallpaper1.jpg'); /* Ganti dengan URL gambar latar belakang yang Anda inginkan */
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .jumbotron h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }
        .jumbotron p {
            font-size: 1.5rem;
        }
        .navbar-brand {
            color: white;
        }
        .nav-link {
            color: white;
        }
        .btn-custom {
            background-color: #FFA500;
            border-color: #FFA500;
            color: white;
        }
        .btn-custom:hover {
            background-color: #FF8C00;
            border-color: #FF8C00;
            color: white;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top">
    <div class="container">
        <a class="navbar-brand text-light fw-bolder fs-4" href="#"><span style="color: orange; font-size: 25px;">K</span>amui <span style="color: orange; font-size: 25px;">G</span>allery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="text-center">
        <h1>Selamat Datang di Kamui Gallery</h1>
        <p>Temukan keindahan dalam setiap foto yang kami sajikan</p>
        <a href="login.php" class="btn btn-lg btn-custom">Lihat Galeri</a>
    </div>
</div>

<footer class="d-flex justify-content-center mt-5 bg-dark fixed-bottom">
    <p class="text-white">&copy; Kamui Gallery 2024</p>
</footer>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
