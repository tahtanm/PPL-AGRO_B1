<?php

session_start();

include '../koneksi.php';

$id_barang = $_GET['id'];
unset($_SESSION['keranjang'][$id_barang]);

echo "<script>alert('Data pesanan berhasil dihapus!')</script>";
echo "<script>location='keranjang.php'</script>";
