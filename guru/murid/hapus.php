<?php
require '../../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_murid']) && is_numeric($_GET['id_murid'])) {
    $id_murid = $_GET['id_murid'];

    $sql = "DELETE FROM murid WHERE id_murid = $id_murid";

    if ($conn->query($sql) === true) {
        header("Location: murid.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid murid ID.";
}

$conn->close();
