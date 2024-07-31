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
                <a class="nav-link" href="../paket/paket.php">
                    <i class="fa-solid fa-file-zipper"></i>
                    <span>Paket</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="murid.php">
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
                            <h1 class="h3 mb-4 text-gray-800">Guru | Daftar Murid</h1>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a class="btn btn-primary" href="tambah.php">
                                <i class="fas fa-plus"></i> Tambah
                            </a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Murid</th>
                                <th>NISN</th>
                                <th>No Handphone</th>
                                <th>Alamat</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sqld = "SELECT * FROM murid";
                            $resultd = mysqli_query($conn, $sqld);

                            if ($resultd) {
                                while ($rowd = mysqli_fetch_assoc($resultd)) {
                                    $id_murid = $rowd['id_murid'];
                                    $nama = $rowd['nama_murid'];
                                    $nisn = $rowd['nisn'];
                                    $nohp = $rowd['no_hp'];
                                    $alamat = $rowd['alamat'];

                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $nama; ?>
                                        </td>
                                        <td>
                                            <?php echo $nisn; ?>
                                        </td>
                                        <td>
                                            <?php echo $nohp; ?>
                                        </td>
                                        <td>
                                            <?php echo $alamat; ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" href="edit.php?id_murid=<?php echo $id_murid ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger" href="#" onclick="confirmDelete(<?php echo $id_murid; ?>)">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                <?php
                                }
                            } else {
                                echo "<tr><td colspan ='8'>Tidak ada data!</td></tr>";
                            }
                                ?>
                                    </tr>
                        </tbody>
                    </table>
                </div>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <script>
        function confirmDelete(id_murid) {
            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Ketika dihapus, Anda tidak dapat mengembalikan data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "hapus.php?id_murid=" + id_murid;
                } else {
                    Swal.fire({
                        title: "Data tidak dihapus!",
                        icon: "error",
                    });
                }
            });
        }
    </script>

</body>

</html>