<?php
session_start();
require '../../backend/koneksi.php';

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_paket"])) {
    $id_paket = $_GET["id_paket"];

    $sqlPaket = "SELECT * FROM paket WHERE id_paket = '$id_paket'";
    $resultPaket = mysqli_query($conn, $sqlPaket);

    if (!$resultPaket) {
        die("Error: " . mysqli_error($conn));
    }

    $paket = mysqli_fetch_assoc($resultPaket);

    $sqlMurid = "SELECT * FROM murid WHERE username = '$username'";
    $resultMurid = mysqli_query($conn, $sqlMurid);

    if (!$resultMurid) {
        die("Error: " . mysqli_error($conn));
    }

    $murid = mysqli_fetch_assoc($resultMurid);

    $id_guru = $paket['id_guru'];
    $sqlGuru = "SELECT * FROM guru WHERE id_guru = '$id_guru'";
    $resultGuru = mysqli_query($conn, $sqlGuru);

    if (!$resultGuru) {
        die("Error: " . mysqli_error($conn));
    }

    $guru = mysqli_fetch_assoc($resultGuru);
} else {
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Murid - Dashboard</title>

    <!-- Custom fonts for this template -->
    <link href="../../plugins/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../plugins/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/36704cc61b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
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
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="paket.php">
                    <i class="fa-solid fa-file-zipper"></i>
                    <span>Paket</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../jadwal/jadwal.php">
                    <i class="fa-solid fa-clock"></i>
                    <span>Jadwal</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../Pembayaran/Pembayaran.php">
                    <i class="fa-solid fa-university"></i>
                    <span>Pembayaran</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fa-solid fa-sign-out"></i>
                    <span>Logout</span>
                </a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                                <img class="img-profile rounded-circle" href="../../vendor/img/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Card -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Murid | Konfirmasi Paket</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1 class="h3 mb-4 text-gray-800">Murid | Konfirmasi Paket</h1>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Informasi Paket:</h4>
                                            <div class="form-group">
                                                <label for="namaPaket">Nama Paket:</label>
                                                <input type="text" class="form-control" id="namaPaket" value="<?php echo $paket['nama_paket']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis">Jenis:</label>
                                                <input type="text" class="form-control" id="jenis" value="<?php echo $paket['jenis']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="durasi">Durasi:</label>
                                                <input type="text" class="form-control" id="durasi" value="<?php echo $paket['durasi']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="jam">Jam:</label>
                                                <input type="text" class="form-control" id="jam" value="<?php echo date('H:i', strtotime($paket['jam_mulai'])) . ' - ' . date('H:i', strtotime($paket['jam_selesai'])); ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlahMurid">Jumlah Murid:</label>
                                                <input type="text" class="form-control" id="jumlahMurid" value="<?php echo $paket['jumlah_murid']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_pemesanan">Tanggal Pemesanan:</label>
                                                <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan" value="<?php echo date("Y-m-d"); ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Harga:</label>
                                                <input type="text" class="form-control" id="harga" value="<?php echo 'Rp ' . number_format($paket['harga'], 0, ',', '.'); ?>" readonly>
                                                <input type="hidden" name="jumlah" value="<?php echo $paket['harga']; ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <h4>Profil Murid:</h4>
                                            <div class="form-group">
                                                <label for="namaMurid">Nama Murid:</label>
                                                <input type="text" class="form-control" id="namaMurid" value="<?php echo $murid['nama_murid']; ?>" readonly>
                                            </div>

                                            <h4>Informasi Rekening Guru:</h4>
                                            <div class="form-group">
                                                <label for="namaGuru">Nama Guru:</label>
                                                <input type="text" class="form-control" id="namaGuru" value="<?php echo $guru['nama']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="noRekening">Nomor Rekening Guru:</label>
                                                <input type="text" class="form-control" id="noRekening" value="<?php echo $guru['no_rekening']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" name="submit" class="btn btn-success">Pesan Sekarang!</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- End Card -->

                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
    <!-- Footer -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- /.container-fluid -->

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
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
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

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $id_paket = $_GET["id_paket"];
        $tanggal_pemesanan = $_POST['tanggal_pemesanan'];
        $harga = $_POST['jumlah'];

        $sql = "INSERT INTO transaksi (tanggal_pemesanan, validasi, jumlah)
    VALUES ('$tanggal_pemesanan', '0', '$harga')";

        if (mysqli_query($conn, $sql)) {
            echo '<script>
        swal.fire({
            title: "Sukses",
            text: "Paket berhasil di pesan!",
            icon: "success",
            confirmButtonText: "OK",
        }).then(function() {
            window.location.href = "checkout.php?id_paket=' . $id_paket . '";
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