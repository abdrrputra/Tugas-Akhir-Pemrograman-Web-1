<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "web");

// Periksa koneksi
if (mysqli_connect_error()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Menangani pencarian
$search_query = '';
if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($koneksi, $_POST['search_term']);
    $search_query = "WHERE nama_barang LIKE '%$search_term%' OR kategori LIKE '%$search_term%'";
}

// Query untuk mengambil semua data barang (termasuk filter pencarian jika ada)
$query = "SELECT * FROM barang $search_query";
$result = mysqli_query($koneksi, $query);

// Cek apakah ada data
if (mysqli_num_rows($result) > 0) {
    // Membuat tabel untuk menampilkan data barang
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Daftar Barang</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color:rgb(66, 78, 110);
                margin: 0;
                padding: 0;
            }
            .container {
                width: 80%;
                margin: 20px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            h2 {
                text-align: center;
                color: #333;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            th, td {
                padding: 12px;
                text-align: left;
                border: 1px solid #ddd;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
            td {
                background-color: #f9f9f9;
            }
            tr:hover td {
                background-color: #f1f1f1;
            }
            .button {
                padding: 8px 16px;
                text-decoration: none;
                color: white;
                background-color:rgb(8, 41, 231);
                border-radius: 5px;
                text-align: center;
            }
            .button:hover {
                background-color:rgb(166, 231, 13);
            }
            .button-back {
                background-color: #2196F3;
                margin-top: 20px;
                display: block;
                text-align: center;
                width: 200px;
                margin: 0 auto;
            }
            .button-back:hover {
                background-color: #0b7dda;
            }
            .button-delete {
                background-color: #f44336;
                text-decoration: none;
                padding: 8px 16px;
                border-radius: 5px;
                color: white;
            }
            .button-delete:hover {
                background-color:rgb(166, 231, 13);
            }
            .search-bar {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border-radius: 5px;
                border: 1px solid #ccc;
                font-size: 16px;
            }
            .search-button {
                padding: 10px 20px;
                background-color:rgb(13, 163, 223);
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .search-button:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>Daftar Barang</h2>
            <form method='POST'>
                <input type='text' name='search_term' class='search-bar' placeholder='Cari barang berdasarkan nama atau kategori'>
                <input type='submit' name='search' value='Cari' class='search-button'>
            </form>
            <table>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok Barang</th>
                    <th>Update Barang</th>
                </tr>";

    // Menampilkan data dalam tabel
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['id_barang'] . "</td>
                <td>" . $row['nama_barang'] . "</td>
                <td>" . $row['kategori'] . "</td>
                <td>" . number_format($row['harga_jual'], 0, ',', '.') . "</td>
                <td>" . number_format($row['harga_beli'], 0, ',', '.') . "</td>
                <td>" . $row['stok_barang'] . "</td>
                <td>
                    <a href='edit_barang.php?id=" . $row['id_barang'] . "' class='button'>Edit</a>
                    <a href='delete_barang.php?id=" . $row['id_barang'] . "' class='button-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus barang ini?\")'>Delete</a>
                </td>
              </tr>";
    }

    echo "</table><br><br>";
    echo "</div>
    </body>
    </html>";
} else {
    echo "Tidak ada data barang.";
}

// Menutup koneksi
mysqli_close($koneksi);
?>
