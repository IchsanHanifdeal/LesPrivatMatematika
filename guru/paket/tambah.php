<?php
session_start();
require '../../backend/koneksi.php';

$username = $_SESSION['username'];
$email = $_SESSION['email'];

$sql = "SELECT * FROM guru WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id_guru = $row['id_guru'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Guru - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../../plugins/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../plugins/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/36704cc61b.js" crossorigin="anonymous"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Les Privat</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../jadwal/jadwal.php">
                    <i class="fa-solid fa-clock"></i>
                    <span>Jadwal</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="paket.php">
                    <i class="fa-solid fa-file-zipper"></i>
                    <span>Paket</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../murid/murid.php">
                    <i class="fa-solid fa-users"></i>
                    <span>Murid</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fa-solid fa-sign-out"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="profil.php" id="userDropdown" role="button">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $username; ?>
                                </span>
                                <img class="img-profile rounded-circle" href="../../vendor/img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="h3 mb-4 text-gray-800">Guru | Tambah Paket</h1>
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_paket">Nama Paket:</label>
                                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga:</label>
                                    <input type="number" class="form-control" id="harga" name="harga" required>
                                </div>
                                <div class=" form-group">
                                    <label for="durasi_paket">Durasi Paket:</label>
                                    <select type="text" class="form-control" id="durasi_paket" name="durasi_paket" required>
                                        <option value="">Pilih Durasi</option>
                                        <option value="1 bulan">1 bulan</option>
                                        <option value="3 bulan">3 bulan</option>
                                        <option value="6 bulan">6 bulan</option>
                                        <option value="12 bulan">1 tahun</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jam_mulai">Jam Mulai:</label>
                                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="number" value="<?php echo $id_guru; ?>" style="display:none;" readonly required>
                                    <label for="id_guru">Guru:</label>
                                    <input type="text" class="form-control" id="guru" name="guru" value="<?php echo $username ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_murid">Jumlah Murid:</label>
                                    <input type="number" class="form-control" id="jumlah_murid" name="jumlah_murid" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_paket">Jenis Paket:</label>
                                    <select type="text" class="form-control" id="jenis_paket" name="jenis_paket" required>
                                        <option value="">Pilih Paket</option>
                                        <option value="1x seminggu">1x seminggu</option>
                                        <option value="2x seminggu">2x seminggu</option>
                                        <option value="3x seminggu">3x seminggu</option>
                                        <option value="4x seminggu">4x seminggu</option>
                                        <option value="5x seminggu">5x seminggu</option>
                                        <option value="6x seminggu">6x seminggu</option>
                                        <option value="setiap hari">Setiap Hari</option>
                                    </select>
                                </div>
                                <input type="hidden" id="id_guru" name="id_guru" value="<?php echo $id_guru; ?>" />
                                <div class="form-group">
                                    <label for="jam_selesai">Jam Selesai:</label>
                                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Mutiara Sabrina</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout"", jika anda ingin meninggalkan dashboard.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../../plugins/vendor/jquery/jquery.min.js"></script>
        <script src="../../plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../plugins/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../plugins/js/sb-admin-2.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_paket = $_POST['nama_paket'];
            $harga = $_POST['harga'];
            $durasi_paket = $_POST['durasi_paket'];
            $jam_mulai = $_POST['jam_mulai'];
            $id_guru = $_POST['id_guru'];
            $jumlah_murid = $_POST['jumlah_murid'];
            $jenis_paket = $_POST['jenis_paket'];
            $jam_selesai = $_POST['jam_selesai'];

            $sql = "INSERT INTO paket (nama_paket, harga, durasi, jam_mulai, id_guru, jumlah_murid, jenis, jam_selesai)
        VALUES ('$nama_paket', '$harga', '$durasi_paket', '$jam_mulai', '$id_guru', '$jumlah_murid', '$jenis_paket', '$jam_selesai')";

            if (mysqli_query($conn, $sql)) {
                echo '<script>
            swal.fire({
                title: "Sukses",
                text: "Data berhasil di input!",
                icon: "success",
                confirmButtonText: "OK",
            }).then(function() {
                window.location.href = "paket.php";
            });
        </script>';
            } else {
                echo '<script>
            swal.fire({
                title: "Error",
                text: "Error: ' . mysqli_error($conn) . '",
                icon: "error",
                confirmButtonText: "OK",
            });
        </script>';
            }
        }
        ?>
</body>

</html>