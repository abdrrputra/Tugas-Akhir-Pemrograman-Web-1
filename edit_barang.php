<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "web");

// Periksa koneksi
if (mysqli_connect_error()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil ID barang dari URL
$id_barang = $_GET['id'];

// Query untuk mengambil data barang berdasarkan ID
$query = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan
if (!$row) {
    die("Barang tidak ditemukan");
}

// Proses jika form disubmit
if (isset($_POST['submit'])) {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok_barang = $_POST['stok_barang'];

    // Query untuk mengupdate data barang
    $update_query = "UPDATE barang SET
                        nama_barang = '$nama_barang',
                        kategori = '$kategori',
                        harga_jual = '$harga_jual',
                        harga_beli = '$harga_beli',
                        stok_barang = '$stok_barang'
                    WHERE id_barang = '$id_barang'";

    if (mysqli_query($koneksi, $update_query)) {
        echo "<script>alert('Data barang berhasil diperbarui'); window.location.href = 'index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Tampilkan halaman edit barang
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Edit Barang</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color:rgb(27, 221, 157);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 16px;
            margin-bottom: 5px;
            color: #555;
        }
        input[type='text'], input[type='number'] {
            padding: 8px;
            margin-bottom: 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type='text']:focus, input[type='number']:focus {
            border-color: #4CAF50;
            outline: none;
        }
        input[type='submit'] {
            padding: 10px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type='submit']:hover {
            background-color: #45a049;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            background-color: #2196F3;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
        }
        .back-button:hover {
            background-color: #0b7dda;
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class='container'>
        <h2>Edit Data Barang</h2>
        <form method='POST'>
            <div class='form-group'>
                <label for='nama_barang'>Nama Barang:</label>
                <input type='text' name='nama_barang' value='{$row['nama_barang']}' required>
            </div>

            <div class='form-group'>
                <label for='kategori'>Kategori:</label>
                <input type='text' name='kategori' value='{$row['kategori']}' required>
            </div>

            <div class='form-group'>
                <label for='harga_jual'>Harga Jual:</label>
                <input type='number' name='harga_jual' value='{$row['harga_jual']}' required>
            </div>

            <div class='form-group'>
                <label for='harga_beli'>Harga Beli:</label>
                <input type='number' name='harga_beli' value='{$row['harga_beli']}' required>
            </div>

            <div class='form-group'>
                <label for='stok_barang'>Stok Barang:</label>
                <input type='number' name='stok_barang' value='{$row['stok_barang']}' required>
            </div>

            <input type='submit' name='submit' value='Update Barang'>
        </form>

        <a href='index.php' class='back-button'>Kembali ke Halaman Utama</a>
    </div>

</body>
</html>";

mysqli_close($koneksi);
?>
