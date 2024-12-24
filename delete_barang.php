<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "web");

// Periksa koneksi
if (mysqli_connect_error()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil ID barang dari URL
$id_barang = $_GET['id'];

// Query untuk menghapus data barang berdasarkan ID
$delete_query = "DELETE FROM barang WHERE id_barang = '$id_barang'";

if (mysqli_query($koneksi, $delete_query)) {
    echo "<script>alert('Data barang berhasil dihapus'); window.location.href = 'index.php';</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 100px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        p {
            text-align: center;
            color: #555;
        }
        .button {
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            border-radius: 5px;
            text-align: center;
            display: block;
            width: 200px;
            margin: 20px auto;
        }
        .button:hover {
            background-color: #45a049;
        }
        .button-back {
            background-color: #2196F3;
        }
        .button-back:hover {
            background-color: #0b7dda;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Penghapusan Barang</h2>
        <p>Data barang berhasil dihapus. Anda akan diarahkan kembali ke halaman utama.</p>
        <a href="index.php" class="button button-back">Kembali ke Halaman Utama</a>
    </div>

</body>
</html>
