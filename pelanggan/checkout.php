<?php 
session_start();
include '../koneksi.php';

// if (!isset($_SESSION['pelanggan'])) {
//     echo "<script>alert('Silahkan login');</script>";
//     echo "<script>location='../index.php';</script>";
// }

if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {

    echo "<script>alert('Harap isi keranjang belanja terlebih dahulu!')</script>";
    echo "<script>location='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="../Assets/icon/themify-icons/themify-icons.css">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="../Assets/icon/icofont/css/icofont.css">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="../Assets/icon/simple-line-icons/css/simple-line-icons.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../Assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Chartlist chart css -->
    <link rel="stylesheet" href="../Assets/plugins/chartist/dist/chartist.css" type="text/css" media="all">

    <!-- Weather css -->
    <link href="../Assets/css/svg-weather.css" rel="stylesheet">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../Assets/css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="../Assets/css/responsive.css">

    <!-- Custom styles for this template -->
    <link href="../Assets/css/sidebars.css" rel="stylesheet">
    
    <title>Checkout</title>
</head>

<body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <div class="wrapper">
        <!-- Navbar-->
        <header class="main-header-top hidden-print">
            <a href="index.php" class="logo"><b>Kres.co PELANGGAN</b></a>
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>

                <!-- Navbar Right Menu-->
                <div class="navbar-custom-menu f-right">
                    <ul class="top-nav">
                        <!-- User Menu-->
                        <li class="dropdown" style="padding-left: 800px;">
                            <a href="profil.php" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                                <span><img class="img-circle " src="../Assets/images/avatar-1.png" style="width:40px;" alt="User Image"></span>
                                <span>
                                    <?php
                                    $no = 1;
                                    $sql = $conn->query("SELECT * FROM pelanggan WHERE username ='$_SESSION[username]'");
                                    while ($data = $sql->fetch_assoc()) {
                                    ?>
                                        <b><?php echo $data['username'] ?></b> <?php  } ?>
                                    <i class=" icofont icofont-simple-down"></i></span>
                            </a>
                            <ul class="dropdown-menu settings-menu">
                                <a style="text-decoration: none; color: black;" href="profil.php">
                                    <li><i class="icon-user"></i> Profile</li>
                                </a>
                                <a style="text-decoration: none; color: black;" href="../logout.php">
                                    <li><i class="icon-logout"></i> Keluar</li>
                                </a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Side-Nav-->
        <aside class="main-sidebar hidden-print">
            <section class="sidebar" id="sidebar-scroll">
                <!-- Sidebar Menu-->
                <ul class="sidebar-menu">
                    <li class="nav-level"></li>
                    <li class="active treeview">
                        <a class="waves-effect waves-dark" href="index.php">
                            <i class="icon-speedometer"></i><span> Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-level"></li>
                    <li class="active treeview">
                        <a class="waves-effect waves-dark" href="keranjang.php">
                            <i class="icon-briefcase"></i><span> Keranjang</span>
                        </a>
                    </li>
                    <li class="nav-level"></li>
                    <li class="active treeview">
                        <a class="waves-effect waves-dark" href="pemesanan/index.php">
                            <i class="icon-briefcase"></i><span> Pemesanan</span>
                        </a>                
                    </li>


                    </li>
                </ul>
            </section>
        </aside>

        <!-- Konten -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="main-header">
                        <h4>Checkout</h4>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Ukuran/Varian</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subharga</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $i = 1; ?>
                        <?php $totalbelanja = 0; ?>
                        <?php foreach ($_SESSION["keranjang"] as $id_barang => $jumlah) : ?>
                            <!-- Menampilkan barang yang sedang diperulangkan berdasarkan id_barang -->
                            <?php

                            $ambil = $conn->query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
                            $pecah = $ambil->fetch_assoc();
                            $subharga = $pecah['harga'] * $jumlah;

                            ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $pecah['nama_barang']; ?></td>
                                <td><?= $pecah['ukuran']; ?></td>
                                <td>Rp. <?= number_format($pecah['harga']); ?></td>
                                <td><?= $jumlah; ?></td>
                                <td>Rp. <?= number_format($subharga); ?></td>
                            </tr>
                            <?php $i++ ?>
                            <?php $totalbelanja += $subharga;  ?>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="5">Total Belanja</th>
                            <th>Rp. <?= number_format($totalbelanja); ?></th>
                        </tr>
                    </tfoot>
                </table>

                
                <form action="nota.php" method="POST">
                    <div class="row">
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" value="<?= $_SESSION['nama_lengkap']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_hp">No Handphone</label>
                                <input type="text" class="form-control" id="no_hp" pattern="[0-9]{12,13}" value="<?= $_SESSION['no_hp']; ?>" readonly>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <label for="id_ongkir">Ongkir</label>
                            <select class="form-control" name="id_ongkir" id="id_ongkir">
                                <option value="">Pilih Ongkos Kirim</option>
                                <?php
                                $ambil = $conn->query("SELECT * FROM ongkir");
                                while ($perongkir = $ambil->fetch_assoc()) : ?>
                                    <option value="<?= $perongkir['id_ongkir']; ?>"><?= $perongkir['nama_kota']; ?> - Rp. <?= number_format($perongkir['tarif']); ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Lengkap Pengiriman</label>
                            <textarea name="alamat_pengiriman" id="" cols="30" rows="10" class="form-control" placeholder="Masukkan alamat lengkap pengiriman (termasuk kode pos)"></textarea>
                        </div>
                    </div> <br>
                        <button type="submit" class="btn btn-primary" name="buat_pesanan">Buat Pesanan</button>
                </form>

                <?php 
                if (isset($_POST['checkout'])) {
                    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                    $id_ongkir = $_POST['id_ongkir'];
                    $tanggal_pembelian = date("Y-m-d");
                    $alamat_pengiriman = $_POST['alamat_pengiriman'];

                    $ambil = $conn->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                    $arrayongkir = $ambil->fetch_assoc();

                    $nama_kota = $arrayongkir['nama_kota'];
                    $tarif = $arrayongkir['tarif'];

                    $subongkir = $jumlah * $ukuran;
                    $total_beban += $subongkir;
        
                    $total_tarif = $tarif * $total_beban;
                    $total_pembelian = $totalbelanja + $total_tarif;

                    // 1. Menyimpan data ke tabel pembelian
                    $koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat_pengiriman)
                    VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_kota', '$tarif', '$alamat_pengiriman')");

                    // mendapatkan id_pembelian barusan terjadi
                    $id_pembelian_barusan = $conn->insert_id;


                    foreach ($_SESSION['keranjang'] as $id_barang => $jumlah) {

                        // mendapatkan data produk berdasarkan id_produk
                        $ambil = $conn->query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
                        $perbarang = $ambil->fetch_assoc();
    
                        $nama = $perbarang['nama_barang'];
                        $harga = $perbarang['harga'];
                        // $berat = $perbarang['berat_barang'];
                        // $subberat = $perbarang['berat_barang'] * $jumlah;
                        $subharga = $perbarang['harga'] * $jumlah;
    
                        $conn->query("UPDATE barang SET jumlah = jumlah - $jumlah WHERE id_barang = '$id_barang'");
    
                        $conn->query("INSERT INTO pembelian_barang (id_pembelian, id_barang, jumlah, nama_barang, harga, subharga)
                        VALUES ('$id_pembelian_barusan', '$id_barang', '$jumlah', '$nama_barang', '$harga', '$subharga')");
                    }

                    // mengosongkan keranjang belanja
                    unset($_SESSION['keranjang']); 

                    // tampilan diarahkan ke halaman nota, nota dari pembelian barusan
                    echo "<script>alert('Pembelian berhasil!');</script>";
                    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
                }
                ?>
            </div>
        </div>


        
    </div>

    <!-- Required Jqurey -->
    <script src="../Assets/plugins/Jquery/dist/jquery.min.js"></script>
        <script src="../Assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../Assets/plugins/tether/dist/js/tether.min.js"></script>

        <!-- Required Fremwork -->
        <script src="../Assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- Scrollbar JS-->
        <script src="../Assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="../Assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

        <!--classic JS-->
        <script src="../Assets/plugins/classie/classie.js"></script>

        <!-- notification -->
        <script src="../Assets/plugins/notification/js/bootstrap-growl.min.js"></script>

        <!-- Sparkline charts -->
        <script src="../Assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

        <!-- Counter js  -->
        <script src="../Assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../Assets/plugins/countdown/js/jquery.counterup.js"></script>

        <!-- Echart js -->
        <script src="../Assets/plugins/charts/echarts/js/echarts-all.js"></script>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>

        <!-- custom js -->
        <script type="text/javascript" src="../Assets/js/main.min.js"></script>
        <script type="text/javascript" src="../Assets/pages/dashboard.js"></script>
        <script type="text/javascript" src="../Assets/pages/elements.js"></script>
        <script src="../Assets/js/menu.min.js"></script>
        <script>
            var $window = $(window);
            var nav = $('.fixed-button');
            $window.scroll(function() {
                if ($window.scrollTop() >= 200) {
                    nav.addClass('active');
                } else {
                    nav.removeClass('active');
                }
            });
        </script>
    
</body>
</html>