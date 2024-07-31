<?php
require '../../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_paket']) && is_numeric($_GET['id_paket'])) {
    $id_paket = $_GET['id_paket'];

    $sql = "DELETE FROM paket WHERE id_paket = $id_paket";

    if ($conn->query($sql) === true) {
        header("Location: paket.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid paket ID.";
}

$conn->close();
