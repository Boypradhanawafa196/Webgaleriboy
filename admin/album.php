<?php
session_start();
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
        <a class="navbar-brand text-light fw-bolder" href="#"><span style="color: orange; font-size: 25px;">K</span>amui <span style="color: orange; font-size: 25px;">G</span>allery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto fw-bolder">
                <a href="home.php" class="nav-link">Home</a>
                <a href="album.php" class="nav-link">Album</a>
                <a href="foto.php" class="nav-link">Foto</a>
            </div>
            </form>
            <a href="../config/aksi_logout.php" class="btn btn-danger m-1">Keluar</a>
        </div>
    </div>
</nav>
  


<div class="container">
    <div class="row">
    <div class="col-md-4 ms-auto">
        <div class="card-body">
            <!-- Tambahkan data-bs-toggle dan data-bs-target untuk membuka modal -->
            <button type="button" class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#tambahAlbumModal"> <i class="fa-solid fa-plus me-2"></i>Tambah Album</button>
        </div>
    </div>
</div>

<!-- Modal untuk menambah album -->
<div class="modal fade" id="tambahAlbumModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Album Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambah album -->
                <form action="../config/aksi_album.php" method="POST">
                    <label class="form-label">Nama Album</label>
                    <input type="text" name="namaalbum" class="form-control" required>
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
        
        <div class="col-md-8">
            <div class="card mt-2" style="margin-bottom : 10%;">
                <div class="card-header">Data Album</div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Album</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = "1";
                            $userid = $_SESSION['userid'];
                            $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                            while($data = mysqli_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['namaalbum'] ?></td>
                                <td><?php echo $data['deskripsi'] ?></td>
                                <td><?php echo $data['tanggaldibuat'] ?></td>
                                <td>
                                <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['albumid'] ?>"><i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <div class="modal fade" id="edit<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                         <div class="modal-content">
                                         <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                  <form action="../config/aksi_album.php" method="POST">
                                                    <input type="hidden" name="albumid" value="<?php echo $data['albumid'] ?>">
                                                    <label class="form-label">Nama Album</label>
                                                     <input type="text" name="namaalbum" value="<?php echo $data['namaalbum'] ?>" class="form-control" required>
                                                     <label class="form-label text-decoration-none">Deskripsi</label>
                                                     <textarea class="form-control" name="deskripsi" required><?php echo $data['deskripsi']; ?>
                                                     </textarea>
                                                 
                                                 </div>
                                                  <div class="modal-footer">
                                                  <button type="submit" name="edit" class="btn btn-success">Edit Data</button>
                                                  </form>
                                                </div>
                                             </div>
                                            </div>
                                        </div>
                                        <div>

                                        <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['albumid'] ?>"><i class="fa-solid fa-delete-left"></i>
                                </button>

                                <div class="modal fade" id="hapus<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                         <div class="modal-content">
                                         <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                  <form action="../config/aksi_album.php" method="POST">
                                                    <input type="hidden" name="albumid" value="<?php echo $data['albumid'] ?>">
                                                    Apakah Anda Yakin Ingin Menghapus Data Ini <strong> <?php echo $data['namaalbum'] ?></strong> ?
                                                 </div>
                                                  <div class="modal-footer">
                                                  <button type="submit" name="hapus" class="btn btn-danger">Hapus Data</button>
                                                  </form>
                                                </div>
                                             </div>
                                            </div>
                                        </div>
                                          </td>
                                          </tr>
                                          <?php } ?>
                                            </tbody>
                                         </table>
                                          </div>
                                           </div>
                                         </div>
                                          </div>
                                          </div>
                                        </div>
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