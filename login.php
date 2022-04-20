<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="Assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body>
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container my-5">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="Assets/images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="registrasi.php" class="signup-image-link">Buat akun</a>
                </div>

                <div>
                    <h2 class="form-title">Masuk</h2>

                    <?php if(isset($error)) : ?>
                        <p style="color: red; font-style: italic">Username atau password Yang Anda Masukkan Salah!</p>
                    <?php endif; ?>

                    <form method="POST" class="login-form" id="login-form" action="ceklogin.php">
                        <div class="form-group">
                            <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="username" placeholder="Username" required/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" required/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" href="index.php" value="Masuk"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>