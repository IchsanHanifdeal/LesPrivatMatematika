<?php
session_start();
require '../../backend/koneksi.php';

$username = $_SESSION['username'];
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
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
                <a class="nav-link" href="../paket/paket.php">
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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Murid | Daftar Pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1 class="h3 mb-4 text-gray-800">Murid | Daftar Pembayaran</h1>
                                </div>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Validasi</th>
                                        <th>Jumlah</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sqld = "SELECT * FROM transaksi";
                                    $resultd = mysqli_query($conn, $sqld);

                                    if ($resultd) {
                                        while ($rowd = mysqli_fetch_assoc($resultd)) {
                                            $id_transaksi = $rowd['id_transaksi'];
                                            $tanggal_pemesanan = $rowd['tanggal_pemesanan'];
                                            $bukti_pembayaran = $rowd['bukti_pembayaran'];
                                            $validasi = $rowd['validasi'];
                                            $jumlah = $rowd['jumlah'];
                                    ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $tanggal_pemesanan; ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    $validasi = isset($validasi) ? $validasi : 0;
                                                    $isDisabled = ($validasi == 0) ? 'disabled' : '';
                                                    ?>
                                                    <a href="#" class="btn btn-success <?php echo $isDisabled; ?>" data-toggle="modal" data-target="#filePreviewModal" onclick="previewFile('<?php echo $bukti_pembayaran; ?>')">
                                                        <i class="fa fa-file"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if (is_null($validasi)) {
                                                        echo '<img src="../../assets/images/loading.svg" style="max-height:25px; max-width:25px;" alt="Loading">';
                                                    } elseif ($validasi == 0) {
                                                        echo '<div class="badge badge-danger">Ditolak</div>';
                                                    } elseif ($validasi == 1) {
                                                        echo '<div class="badge badge-success">Diterima</div>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo 'Rp ' . number_format($jumlah, 0, ',', '.'); ?></td>
                                                <td>
                                                    <?php
                                                    $isDisabledUpload = ($validasi == 1) ? 'disabled' : '';
                                                    ?>
                                                    <button class="btn btn-primary <?php echo $isDisabledUpload; ?>" data-toggle="modal" data-target="#uploadModal" <?php echo $isDisabledUpload; ?>>
                                                        <i class="fas fa-plus"></i> Upload
                                                    </button>
                                                    <?php if ($validasi == 1) { ?>
                                                        <script>
                                                            document.querySelector('button.btn.btn-primary').addEventListener('click', function(event) {
                                                                event.preventDefault();
                                                            });
                                                        </script>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan ='6'>Tidak ada data!</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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

    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="bukti_pembayaran">Pilih Berkas</label>
                            <input type="file" class="form-control-file" id="bukti_pembayaran" name="bukti_pembayaran" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal for File Preview -->
    <div class="modal fade" id="filePreviewModal" tabindex="-1" role="dialog" aria-labelledby="filePreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filePreviewModalLabel">File Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="pdfPreviewContainer"></div>
                    <button class="btn btn-primary" onclick="printPDF('<?php echo $file; ?>')">Print PDF</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewFile(file) {
            var fileExtension = 'pdf';
            var previewContainer = document.getElementById('pdfPreviewContainer');

            previewContainer.innerHTML = '<embed src="../../uploads/' + file + '" type="application/pdf" width="100%" height="600px" />';
            previewFile.currentFile = file;

            $('#filePreviewModal').modal('show');
        }

        function printPDF() {
            var file = previewFile.currentFile;

            if (!file) {
                console.error('No file path available for printing.');
                return;
            }

            var fileExtension = 'pdf';

            if (fileExtension === 'pdf') {
                var printWindow = window.open('../../uploads/' + file, '_blank');
                if (printWindow) {
                    printWindow.print();
                } else {
                    alert('Failed to open print window.');
                }
            } else {
                alert('Only PDF files are allowed.');
            }
        }
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bukti_pembayaran = $_FILES['bukti_pembayaran'];

        $targetDirectory = "../../uploads/";
        $targetFile = $targetDirectory . basename($bukti_pembayaran['name']);

        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if ($fileType === 'pdf') {
            if (move_uploaded_file($bukti_pembayaran['tmp_name'], $targetFile)) {
                $insert_sql = "UPDATE transaksi SET validasi = 1, bukti_pembayaran = '$bukti_pembayaran[name]' WHERE id_transaksi = $id_transaksi";

                if (mysqli_query($conn, $insert_sql)) {
                    echo '<script>
                        swal.fire({
                            title: "Sukses",
                            text: "Data berhasil diinput!",
                            icon: "success",
                            confirmButtonText: "OK",
                        }).then(function() {
                            window.location.href = "pembayaran.php";
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
            } else {
                echo '<script>
                    swal.fire({
                        title: "Error",
                        text: "Error uploading file.",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                </script>';
            }
        } else {
            echo '<script>
                swal.fire({
                    title: "Error",
                    text: "Only PDF files are allowed.",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            </script>';
        }
    }
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../../plugins/vendor/jquery/jquery.min.js"></script>
    <script src="../../plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../plugins/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../plugins/js/sb-admin-2.min.js"></script>
</body>

</html>