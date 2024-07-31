<?php
require '../../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_jadwal']) && is_numeric($_GET['id_jadwal'])) {
    $id_jadwal = $_GET['id_jadwal'];

    $sql = "DELETE FROM jadwal WHERE id_jadwal = $id_jadwal";

    if ($conn->query($sql) === true) {
        header("Location: jadwal.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid jadwal ID.";
}

$conn->close();
