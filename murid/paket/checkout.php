<?php
session_start();
include '../../backend/koneksi.php';

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
    header("Location: paket.php");
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Bukti Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <h4>Informasi Paket:</h4>
                        <p><strong>Nama Paket:</strong> <?php echo $paket['nama_paket']; ?></p>
                        <p><strong>Jenis:</strong> <?php echo $paket['jenis']; ?></p>
                        <p><strong>Durasi:</strong> <?php echo $paket['durasi']; ?></p>
                        <p><strong>Jam:</strong> <?php echo date('H:i', strtotime($paket['jam_mulai'])) . ' - ' . date('H:i', strtotime($paket['jam_selesai'])); ?></p>
                        <p><strong>Jumlah Murid:</strong> <?php echo $paket['jumlah_murid']; ?></p>
                        <p><strong>Harga:</strong> <?php echo 'Rp ' . number_format($paket['harga'], 0, ',', '.'); ?></p>

                        <h4>Profil Murid:</h4>
                        <p><strong>Nama Murid:</strong> <?php echo $murid['nama_murid']; ?></p>

                        <h4>Informasi Rekening Guru:</h4>
                        <p><strong>Nama Guru:</strong> <?php echo $guru['nama']; ?></p>
                        <p><strong>Nomor Rekening:</strong> <?php echo $guru['no_rekening']; ?></p>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-secondary mb-2 mr-3" href="paket.php">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>

</body>

</html>