<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamui Gallery</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color:#233A66;
            font-family:  'Poppins', sans-serif;
        }
        .navbar {
            background-color:#233A66;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg shadow-lg">
  <div class="container">
    <!-- <img src="../assets/img/icon.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top"> -->
    <a class="navbar-brand text-light fw-bolder" href="#"><span style="color: orange; font-size: 25px;">K</span>amui <span style="color: orange; font-size: 25px;">G</span>allery</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
      </div>
    </div>
  </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-body rounded" style="background-color:#FFD691; padding: 10px;">
                <div class="text-center">
                    <h5 style="font-family:poppins; font-weight:600;">Login</h5>
                </div>
                <form action="config/aksi_login.php" method="POST">
                    <label class="form-label">Username</label>
                    <div class="position-relative d-grid align-items-center">
                    <input type="text" name="username" class="form-control" style="padding-left: 2rem;" required>
                    <i class="fa-solid fa-user position-absolute" style="left: 10px;"></i>
                    </div>
                    <label class="form-label">Password</label>
                    <div class="position-relative d-grid align-items-center">
                    <input type="password" name="password" class="form-control" id="password" style="padding-left: 2rem; padding-right: 2rem;" required>
                    <i class="fa-solid fa-lock position-absolute" style="left: 10px;"></i>
                    <div class="position-absolute" style="right: 10px;" onclick="togglePassword()">
                    <i id="toggleButton" class="fa-solid fa-eye"></i>
                    </div>
                    </div>
                    <div class="d-grid mt-2 ">
                        <button class="text-white rounded border-0" type="submit" name="kirim" 
                        style="background-color:#D7A859; padding:6px;">Login</button>
                    </div>
                </form>
                <hr>
                <p style="font-family:poppins;">Belum Punya Akun? <a href="register.php" class="text-decoration-none">Daftar Disini</a></p>
            </div>
        </div>
    </div>
</div>

<footer class="d-flex justify-content-center mt-3 fixed-bottom" style="background-color:#233A66;">
    <p class="text-white">&copy; Kamui Gallery 2024</p>
</footer>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 
<script>
    function togglePassword() {
    let passwordInput = document.getElementById("password");
    let toggleButton = document.getElementById("toggleButton");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleButton.className = "fa-solid fa-eye-slash";
    } else {
        passwordInput.type = "password";
        toggleButton.className = "fa-solid fa-eye";
  }
}
</script>
</body>
</html>