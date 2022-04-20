<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    
    <!-- Font Icon -->
    <link rel="stylesheet" href="Assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body>

<div class="main">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Daftar</h2>
                    <form method="POST" action="proses_regis.php" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="nama lengkap" id="nama lengkap" placeholder="Nama Lengkap" required/>
                        </div>
                        <div class="form-group">
                            <label for="tempat lahir"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="tempat lahir" id="tempat lahir" placeholder="Tempat Lahir" required/>
                        </div>
                        <div class="form-group">
                            <label for="tanggal lahir"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="date" name="tanggal lahir" id="tanggal lahir" placeholder="Tanggal Lahir" required/>
                        </div>
                        <div class="form-group">
                            <label for="jenis kelamin"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="jenis kelamin" id="jenis kelamin" placeholder="Jenis Kelamin" required/>
                        </div>
                        <div class="form-group">
                            <label for="alamat"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="alamat" id="alamat" placeholder="Alamat" required/>
                        </div>
                        <div class="form-group">
                            <label for="no hp"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="tel" name="no hp" id="no hp" pattern="[0-9]{12,13}" placeholder="No HP" required/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Email" required/>
                        </div>
                        <div class="form-group">
                            <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="username" placeholder="Username" required/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" required/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password2" id="password2" placeholder="Ulangi password anda" required/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" href="index.php" value="Daftar"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="Assets/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="login.php" class="signup-image-link">Sudah punya akun</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>