<?php
session_start();
$userid = $_SESSION['userid'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login'){
    echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamui Gallery</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <style>
        body {
            background-color:#233A66;
            font-family:  'Poppins', sans-serif;
        }
        .navbar {
            background-color:#4169E1;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.8);
            margin-bottom : 23%; 
        }
        .card-img-top {
            image-rendering: crisp-edges;
            max-width: 100%; 
            height: auto;
        }
        footer {
            background-color: #233A66;
            color: white;

            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
    <div class="container">
        <a class="navbar-brand text-light fw-bolder" href="index.php"><span style="color: orange; font-size: 25px;">K</span>amui <span style="color: orange; font-size: 25px;">G</span>allery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto fw-bolder">
                <a href="home.php" class="nav-link">Home</a>
                <a href="album.php" class="nav-link">Album</a>
                <a href="foto.php" class="nav-link">Foto</a>
            </div>
            <a href="../config/aksi_logout.php" class="btn btn-danger m-1">Keluar</a>
        </div>
    </div>
</nav>
  

<div class="container mt-3 px-5 text-light">
    Album :
    <?php
    $album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
    while ($row = mysqli_fetch_array($album)) { ?>
      <a href="home.php?albumid=<?php echo $row['albumid'] ?>" class="btn btn-warning text-black">
        <?php echo $row['namaalbum'] ?></a>

    <?php } ?>
  </div>

  <div class="row container m-auto">
    <?php
    if (isset($_GET['albumid'])) {
      $albumid = $_GET['albumid'];
      $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid' AND albumid='$albumid'");
      while ($data = mysqli_fetch_array($query)) { ?>
        <div class="col-md-3 mt-2">
          <a class="custom-pointer" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
          <div class="card">
                            <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height: 12rem;">
                            <div class="card-footer text-center">
                                <?php
                                $fotoid = $data['fotoid'];
                                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                if (mysqli_num_rows($ceksuka) == 1) { ?>
                                    <a href="../config/proses_like2.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka"><i class="fa fa-heart text-danger"></i></a>
                                <?php } else { ?>
                                    <a href="../config/proses_like2.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka"><i class="fa-regular fa-heart text-black"></i></a>
                                <?php }
                                $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                echo mysqli_num_rows($like) . ' suka';
                                ?>
                               <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i class="fa-regular fa-comment text-black"></i></a>
                                <?php
                                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                echo mysqli_num_rows($jmlkomen) . ' Komentar';
                                ?>
                            </div>
                        </div>
          </a>


          <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content bg-light-subtle">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-8">
                      <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                    </div>
                    <div class="col-md-4">
                      <div class="m-2">
                        <div class="overflow-auto">
                          <div class="sticky-top text-2xl text-black">
                            <strong><?php echo $data['judulfoto'] ?></strong><br>

                            <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>

                          </div>
                          <hr>
                          <p class="text-black border-b">
                            <?php echo $data['deskripsifoto'] ?>
                          </p>
                          <hr>
                          <?php
                          $fotoid = $data['fotoid'];
                          $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                          while ($row = mysqli_fetch_array($komentar)) {
                          ?>
                            <p class="text-start mt-2 text-black">
                              <strong><?php echo $row['namalengkap'] ?>: &nbsp;</strong>
                              <span><?php echo $row['isikomentar'] ?></span>
                            </p>
                          <?php } ?>
                          <hr>
                          <div class="sticky-bottom">
                            <form action="../config/proses_komentar2.php" method="POST">
                              <div class="input-group">
                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
                                <div class="input-group-prepend">
                                  <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php }
    } else {

      $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
      while ($data = mysqli_fetch_array($query)) {
      ?>

        <div class="col-md-3 mt-2">
          <a class="custom-pointer" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
          <div class="card">
                <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto']?>" style="height: 12rem;">
                    <div class="card-footer text-center">
                        <?php
                            $fotoid = $data['fotoid'];
                                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                if (mysqli_num_rows($ceksuka) == 1) { ?>
                                    <a href="../config/proses_like2.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka"><i class="fa fa-heart text-danger"></i></a>
                                <?php } else { ?>
                                    <a href="../config/proses_like2.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka"><i class="fa-regular fa-heart text-black"></i></a>
                                <?php }
                                $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                echo mysqli_num_rows($like) . ' suka';
                                ?>
                               <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i class="fa-regular fa-comment text-black"></i></a>
                                <?php
                                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                echo mysqli_num_rows($jmlkomen) . ' Komentar';
                                ?>
                            </div>
                        </div>
          </a>
        </div>

        <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content bg-light-subtle">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-8">
                    <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                  </div>
                  <div class="col-md-4">
                    <div class="m-2">
                      <div class="overflow-auto">
                        <div class="sticky-top text-black text-2xl">
                          <strong><?php echo $data['judulfoto'] ?></strong><br>

                          <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>

                        </div>
                        <hr>
                        <p class="text-black border-b">
                          <?php echo $data['deskripsifoto'] ?>
                        </p>
                        <hr>
                        <?php
                        $fotoid = $data['fotoid'];
                        $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                        while ($row = mysqli_fetch_array($komentar)) {
                        ?>
                          <p class="text-start mt-2 text-black">
                            <strong><?php echo $row['namalengkap'] ?>: &nbsp;</strong>
                            <span><?php echo $row['isikomentar'] ?></span>
                          </p>
                        <?php } ?>
                        <hr>

                        <div class="sticky-bottom">
                          <form action="../config/proses_komentar2.php" method="POST">
                            <div class="input-group">
                              <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                              <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
                              <div class="input-group-prepend">
                                <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php }
    } ?>

  <footer>
    <div class="container">
        <div class="text-center">
            <p>&copy; Kamui Gallery 2024</p>
        </div>
    </div>
</footer>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>