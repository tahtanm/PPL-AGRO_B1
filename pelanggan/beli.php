<?php
session_start();

include '../koneksi.php';

$id_barang = $_GET['id_barang'];

// jika sudah ada produk tsb dikeranjang, maka produk itu jumlahnya di +1
if (isset($_SESSION['keranjang'][$id_barang])) {
    $_SESSION['keranjang'][$id_barang] += 1;
} else {
    // jika belum ada dikeranjang maka produk dianggap dibeli 1
    $_SESSION['keranjang'][$id_barang] = 1;
};

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

echo "<script>alert('Produk telah ditambahkan ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
