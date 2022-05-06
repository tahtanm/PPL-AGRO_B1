<?php
session_start();

include '../koneksi.php';

// ======================= ERROR ==============================
// $id_barang = $_GET['id_barang'];

// $sql = $conn->query("SELECT * FROM barang WHERE id_barang = '$id_barang' ");
// $data = $sql->fetch_assoc();



// ======================== NEW SOLVE =========================
// mendapatkan id data dari url
$id_barang = $_GET['id'];

// query ambil data
$data = $conn->query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
$perdata = $data->fetch_assoc();
// ======================================================
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

    <title>Detail Barang</title>
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
                                    <li><i class="icon-logout"></i> Logout</li>
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
                        <a class="waves-effect waves-dark" href="pemesanan/index.php">
                            <i class="icon-briefcase"></i><span> Pemesanan</span>
                        </a>
                    </li>
                    <li class="nav-level"></li>
                    <li class="active treeview">
                        <a class="waves-effect waves-dark" href="keranjang.php">
                            <i class="icon-briefcase"></i><span> Keranjang</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>

        <!-- Konten -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="main-header">
                        <h4>Detail Barang</h4>
                        <!-- <pre><?= print_r($perdata); ?></pre> -->
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="../produk/<?= $perdata['foto_barang']; ?>" width="300" height="300" alt="..." class="img-responsive">
                        </div>
                        <div class="col-md-6">
                            <h2><?= $perdata['nama_barang'] ?></h2>
                            <h4>Harga : Rp <?= number_format($perdata['harga']) ?></h4>
                            <h4>Status : <b><?= $perdata['pilihan'] ?></h4>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="number" min="1" class="form-control" name="jumlah">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary" name="beli">Beli</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <?php
                            // jika tombol beli ditekan
                            if (isset($_POST['beli'])) {

                                // mendapatkan jumlah yang di inputkan
                                $jumlah = $_POST['jumlah'];

                                // memasukkan ke dalam keranjang
                                $_SESSION['keranjang'][$id_barang] = $jumlah;

                                echo "<script>alert('Produk telah dimasukkan kedalam keranjang belanja');</script>";
                                echo "<script>location='keranjang.php';</script>";
                            }
                            ?>
                        </div>
                    </div>
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